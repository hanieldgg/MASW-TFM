import { Component, OnInit, Input, EventEmitter, Output } from '@angular/core';
import { IonicModule } from '@ionic/angular';

import { EntryService } from 'src/app/services/entries/entries.service';
import { EntryCategoryService } from 'src/app/services/entry-categories/entry-categories.service';
@Component({
    selector: 'app-entry-card',
    templateUrl: './entry-card.component.html',
    styleUrls: ['./entry-card.component.scss'],
    standalone: true,
    providers: [EntryCategoryService],
    imports: [IonicModule],
})
export class EntryCardComponent implements OnInit {
    @Input() entry: any;
    @Input() checkout: boolean = false;
    @Output() entryToDelete = new EventEmitter();
    public entry_category: any;
    public full_entry_category: string = '';
    public price: number = 0;

    constructor(
        private entryCategoryService: EntryCategoryService,
        private entryService: EntryService
    ) {}

    ngOnInit() {
        this.getFullCategory(this.entry.entry_category_id);

        if (this.checkout) {
            this.entryCategoryService
                .findEntryCategory(this.entry.entry_category_id)
                .subscribe({
                    next: (info) => {
                        if (info.status == 200) {
                            this.price = info.data.price;
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    },
                });
        }
    }

    getFullCategory(id: number) {
        this.entryCategoryService.getFullEntryCategory(id).subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.full_entry_category = info.data;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    deleteEntry() {
        this.entryService.deleteEntry(this.entry.id).subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.emitDelete();
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    public emitDelete() {
        this.entryToDelete.emit(this.entry);
    }
}
