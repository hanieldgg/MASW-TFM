import { Component, OnInit, Input, EventEmitter, Output } from '@angular/core';
import { IonicModule } from '@ionic/angular';

import { EntryService } from 'src/app/services/entries/entries.service';
import { EntryCategoryService } from 'src/app/services/entry-categories/entry-categories.service';
import { FileUploadService } from 'src/app/services/file-upload/file-upload.service';

@Component({
    selector: 'app-entry-card',
    templateUrl: './entry-card.component.html',
    styleUrls: ['./entry-card.component.scss'],
    standalone: true,
    providers: [EntryCategoryService, FileUploadService, EntryService],
    imports: [IonicModule],
})
export class EntryCardComponent implements OnInit {
    @Input() entry: any;
    @Input() checkout: boolean = false;
    @Output() entryToDelete = new EventEmitter();
    public files: any = [];
    public openedFile: any = {
        file_name: '',
        file_type: '',
        file_url: '',
    };
    public entry_category: any;
    public full_entry_category: string = '';
    public price: number = 0;
    private selectedFile: any;

    isModalOpen = false;

    setOpen(isOpen: boolean) {
        this.isModalOpen = isOpen;
    }

    constructor(
        private entryCategoryService: EntryCategoryService,
        private entryService: EntryService,
        private fileUploadService: FileUploadService
    ) {}

    ngOnInit() {
        this.getFullCategory(this.entry.entry_category_id);

        if (this.entry.payment_status == 'paid') {
            this.refreshFileList();
        }

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

    refreshFileList() {
        this.fileUploadService.listEntryFiles(this.entry.id).subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.files = info.data;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
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

    emitDelete() {
        this.entryToDelete.emit(this.entry);
    }

    onFileSelected(event: any) {
        this.selectedFile = event.target.files[0];

        this.fileUploadService
            .upload(this.selectedFile, this.entry.id)
            .subscribe({
                next: (info) => {
                    this.refreshFileList();
                },
                error: (error) => {
                    console.error(error);
                },
            });
    }

    uploadFiles() {
        const button = document.getElementById('fileUploader');

        button?.click();
    }

    toggleMediaModal(file: any) {
        this.openedFile.file_name = file.file_name;
        this.openedFile.file_type = file.file_type;
        this.openedFile.file_url = file.file_url;

        if (this.openedFile.file_type.includes('image')) {
            this.setOpen(true);
        } else {
            window.open(this.openedFile.file_url, '_system');
        }
    }
}
