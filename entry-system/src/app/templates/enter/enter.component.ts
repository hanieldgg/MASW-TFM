import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';

import { Entry } from 'src/app/models/entry';
import { EnterCardComponent } from 'src/app/components/enter/enter-card/enter-card.component';

import { EntryService } from 'src/app/services/entries/entries.service';

@Component({
    selector: 'app-enter',
    templateUrl: './enter.component.html',
    styleUrls: ['./enter.component.scss'],
    standalone: true,
    providers: [EntryService],
    imports: [IonicModule, EnterCardComponent],
})
export class EnterComponent implements OnInit {
    public entries: Entry[] = [];
    public isToastOpen: boolean = false;
    public isLoading: boolean = false;
    public isAlertOpen: boolean = false;
    public alertButtons: string[] = ['Ok'];
    public showCheckout: boolean = false;

    constructor(private entryService: EntryService, private router: Router) {
        this.addNewEntry();
    }

    ngOnInit() {
        this.entryService.getUserUnpaidEntries().subscribe({
            next: (info) => {
                if (info.data.length > 0) {
                    this.showCheckout = true;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    addNewEntry() {
        let new_entry = new Entry(0, '', '', '', 0, '', '', 0, 0, 0, '');
        this.entries.push(new_entry);
    }

    saveChanges(goToCheckout: boolean) {
        let body: any = {
            entries: [],
        };

        let isValid: boolean = true;

        this.entries.forEach(function (value, index) {
            let new_entry = {
                title: value.title,
                entry_category: value.entry_category,
                description: value.description,
            };

            if (value.title == '' || value.entry_category == 0) {
                isValid = false;
            } else {
                body.entries.push(new_entry);
            }
        });

        if (isValid) {
            this.setLoading(true);

            this.entryService.createEntry(body).subscribe({
                next: (info) => {
                    if (info.status == 200) {
                        this.setOpen(true);
                        this.setLoading(false);

                        this.entries = [
                            new Entry(0, '', '', '', 0, '', '', 0, 0, 0, ''),
                        ];

                        if (goToCheckout) {
                            this.navigateToCheckout();
                        }
                    }
                },
                error: (error) => {
                    console.log(error);
                    this.setLoading(false);
                },
            });
        } else {
            this.setAlertOpen(true);
        }
    }

    navigateToCheckout() {
        this.router.navigate(['/checkout']);
    }

    setLoading(isPageLoading: boolean) {
        this.isLoading = isPageLoading;
    }

    setAlertOpen(isOpen: boolean) {
        this.isAlertOpen = isOpen;
    }

    setOpen(isOpen: boolean) {
        this.isToastOpen = isOpen;
    }

    removeEntry(index: number) {
        this.entries.splice(index, 1);
    }
}
