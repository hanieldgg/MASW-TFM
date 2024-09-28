import { Component, OnInit, Input } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';

import { EntryCardComponent } from '../entry-card/entry-card.component';

@Component({
    selector: 'app-accordion-payment-status',
    templateUrl: './accordion-payment-status.component.html',
    styleUrls: ['./accordion-payment-status.component.scss'],
    standalone: true,
    imports: [IonicModule, EntryCardComponent],
})
export class AccordionPaymentStatusComponent implements OnInit {
    public status_formated: string = '';
    @Input() status: string = '';
    @Input() total_entries: number = 0;
    @Input() entries: any;
    @Input() key: number = 0;

    constructor(private router: Router) {}

    ngOnInit() {
        this.status_formated = this.getStatus(this.status);
    }

    getStatus(status: string): string {
        switch (this.status) {
            case 'winner':
                return 'Winning Entries';
            case 'judged':
                return 'Judged Entries';
            case 'paid':
                return 'Paid Entries';
            case 'unpaid':
                return 'Unpaid Entries';
            default:
                return 'Unpaid Entries';
        }
    }

    navigateToCheckout() {
        this.router.navigate(['/checkout']);
    }
}
