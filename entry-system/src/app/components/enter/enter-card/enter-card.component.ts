import { Component, OnInit, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';

import { EntryCategoryService } from 'src/app/services/entry-categories/entry-categories.service';

@Component({
    selector: 'app-enter-card',
    templateUrl: './enter-card.component.html',
    styleUrls: ['./enter-card.component.scss'],
    standalone: true,
    providers: [EntryCategoryService],
    imports: [IonicModule, FormsModule],
})
export class EnterCardComponent implements OnInit {
    @Input() entry: any = [];
    public entry_categories: any = [];

    constructor(private entryCategoryService: EntryCategoryService) {
        this.entryCategoryService.getEntryCategories().subscribe({
            next: (info) => {
                let new_level = info.data;
                this.entry_categories.push(new_level);
                console.log(this.entry_categories);
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    ngOnInit() {}

    onSubmit() {}

    getCategories($event: any) {
        let search_id = $event.detail.value;

        this.entryCategoryService.findEntryCategory(search_id).subscribe({
            next: (info) => {
                let new_level = info.data;

                if (new_level.children && new_level.children.length > 0) {
                    this.entry_categories.push(new_level.children);
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }
}
