import { Component } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';

import { EntryCategoryService } from 'src/app/services/entry-categories/entry-categories.service';
import { EntryService } from 'src/app/services/entries/entries.service';

@Component({
    selector: 'app-checkout',
    templateUrl: './checkout.component.html',
    styleUrls: ['./checkout.component.scss'],
    standalone: true,
    providers: [EntryService, EntryCategoryService],
    imports: [IonicModule, CommonModule],
})
export class CheckoutComponent {
    isLoading: boolean = false;
    cartItems: any[] = [];
    totalAmount: number = 0;
    isAlertOpen: boolean = false;
    isToastOpen: boolean = false;
    alertButtons = ['OK'];

    constructor(
        private entryService: EntryService,
        private entryCategoryService: EntryCategoryService
    ) {
        this.loadCartItems();
    }

    loadCartItems() {
        this.isLoading = true;

        this.entryService.getUserUnpaidEntries().subscribe({
            next: (info) => {
                if (info.status == 200) {
                    let entries = info.data;

                    // this.cartItems = [
                    //     { name: 'Item 1', price: 10 },
                    //     { name: 'Item 2', price: 20 },
                    // ];

                    this.cartItems = [];

                    entries.forEach((entry: any) => {
                        this.entryCategoryService
                            .findEntryCategory(entry.entry_category_id)
                            .subscribe({
                                next: (info) => {
                                    if (info.status == 200) {
                                        let newItem = {
                                            name: info.data.title,
                                            price: info.data.price,
                                        };

                                        this.cartItems.push(newItem);
                                        this.calculateTotal();
                                    }
                                },
                                error: (error) => {
                                    console.log(error);
                                    this.isLoading = false;
                                },
                            });
                    });

                    this.isLoading = false;
                }
            },
            error: (error) => {
                console.log(error);
                this.isLoading = false;
            },
        });
    }

    calculateTotal() {
        this.totalAmount = this.cartItems.reduce(
            (acc, item) => acc + item.price,
            0
        );
    }

    removeItem(index: number) {
        this.cartItems.splice(index, 1);
        this.calculateTotal();
    }

    goBack() {}

    saveCart() {
        this.isToastOpen = true;
    }

    proceedToPayment() {}

    setAlertOpen(isOpen: boolean) {
        this.isAlertOpen = isOpen;
    }

    setOpen(isOpen: boolean) {
        this.isToastOpen = isOpen;
    }
}
