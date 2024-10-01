import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';

import { BraintreeService } from 'src/app/services/braintree-service/braintree-service.service';
import { EntryService } from 'src/app/services/entries/entries.service';
import { EntryCategoryService } from 'src/app/services/entry-categories/entry-categories.service';

import { EntryCardComponent } from 'src/app/components/entries/entry-card/entry-card.component';

declare var braintree: any;

@Component({
    selector: 'app-checkout',
    standalone: true,
    imports: [IonicModule, EntryCardComponent],
    providers: [BraintreeService, EntryService, EntryCategoryService],
    templateUrl: './checkout.component.html',
    styleUrls: ['./checkout.component.scss'],
})
export class CheckoutComponent implements OnInit {
    private hostedFieldsInstance: any;
    public unpaidEntries: any;
    public total: number = 0;
    public isToastOpen: boolean = false;

    constructor(
        private entryService: EntryService,
        private entryCategoryService: EntryCategoryService,
        private braintreeService: BraintreeService,
        private router: Router
    ) {}

    ngOnInit() {
        this.braintreeService.getClientToken().subscribe((data) => {
            this.initializeHostedFields(data.clientToken);
        });
        this.entryService.getUserUnpaidEntries().subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.unpaidEntries = info.data;
                    this.calculateTotal(this.unpaidEntries);
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    calculateTotal(entries: any) {
        entries.forEach((entry: any) => {
            this.entryCategoryService
                .findEntryCategory(entry.entry_category_id)
                .subscribe((info: any) => {
                    this.total += info.data.price;
                });
        });
    }

    initializeHostedFields(clientToken: string) {
        const form = document.querySelector('#payment-form');

        braintree.hostedFields.create(
            {
                authorization: clientToken,
                preventAutofill: true,
                fields: {
                    cardholderName: {
                        selector: '#card-name',
                        placeholder: 'John Doe',
                        formatInput: false,
                    },
                    number: {
                        selector: '#card-number',
                        placeholder: '4111 1111 1111 1111',
                        formatInput: false,
                    },
                    cvv: {
                        selector: '#cvv',
                        placeholder: '123',
                    },
                    expirationDate: {
                        selector: '#expiration-date',
                        placeholder: 'MM/YY',
                    },
                },
            },
            (err: any, instance: any) => {
                if (err) {
                    console.error(err);
                    return;
                }
                this.hostedFieldsInstance = instance;

                form?.addEventListener('submit', (event) => {
                    event.preventDefault();
                    this.onSubmit();
                });
            }
        );
    }

    onSubmit() {
        this.hostedFieldsInstance.tokenize((tokenizeErr: any, payload: any) => {
            if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
            }
            this.processPayment(payload.nonce);
        });
    }

    setOpen(isOpen: boolean) {
        this.isToastOpen = isOpen;
    }

    navigateHome() {
        this.setOpen(false);
        this.router.navigate(['/entries']);
    }

    processPayment(nonce: string) {
        this.braintreeService
            .processPayment(nonce, this.total.toString(), this.unpaidEntries)
            .subscribe({
                next: (response) => {
                    this.setOpen(true);
                },
                error: (error) => {
                    console.error('Transaction failed: ', error);
                    // Handle error
                },
            });
    }
}
