import { Component, OnInit, Input } from '@angular/core';
import { IonicModule } from '@ionic/angular';

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
    public entry_category: string = '';

    constructor(private entryCategoryService: EntryCategoryService) {}

    ngOnInit() {
        this.getFullCategory(this.entry.entry_category_id);
    }

    getFullCategory(id: number) {
        this.entryCategoryService.getFullEntryCategory(id).subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.entry_category = info.data;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }
}
