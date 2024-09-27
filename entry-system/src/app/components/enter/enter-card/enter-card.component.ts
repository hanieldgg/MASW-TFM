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
    @Input() entry: any;
    public entry_categories: any = [];
    public compiled_entry_category: string[] = [];

    constructor(private entryCategoryService: EntryCategoryService) {
        this.entryCategoryService.getEntryCategories().subscribe({
            next: (info) => {
                let new_level = info.data;
                this.entry_categories.push(new_level);
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    ngOnInit() {}

    onSubmit() {}

    handleEntryCategoryChange($event: any) {
        let index: number = parseInt($event.srcElement.id);
        let value: number = parseInt($event.detail.value);

        if (value) {
            this.updateEntryCategoriesDropdowns(index, value);
        }
    }

    updateEntryCategoriesDropdowns(s_index: number, s_value: number) {
        let array_index = s_index;
        let search_id = s_value;
        let array_length = this.entry_categories.length;

        this.entry_categories.forEach((item: any, index: any) => {
            if (index > array_index) {
                this.entry_categories.splice(index, array_length - array_index);
                this.compiled_entry_category.splice(
                    index - 1,
                    array_length - array_index
                );
            }
        });

        this.entryCategoryService.findEntryCategory(search_id).subscribe({
            next: (info) => {
                let new_level = info.data;

                if (new_level.children && new_level.children.length > 0) {
                    this.entry_categories.push(new_level.children);
                }

                if (array_index == 2) {
                    this.entry.entry_category = new_level.id;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }
}
