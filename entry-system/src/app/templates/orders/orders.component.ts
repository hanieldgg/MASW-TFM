import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';

import { OrdersService } from 'src/app/services/orders/orders.service';

@Component({
    selector: 'app-orders',
    templateUrl: './orders.component.html',
    styleUrls: ['./orders.component.scss'],
    standalone: true,
    providers: [OrdersService],
    imports: [IonicModule],
})
export class OrdersComponent implements OnInit {
    public orders: any;

    constructor(private ordersService: OrdersService) {}

    ngOnInit() {
        let params = {
            userID: 1,
        };
        this.ordersService.getUsersOrders(params).subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.orders = info.data;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    formatDateToLocal(isoString: string): string {
        const date = new Date(isoString);

        const options: Intl.DateTimeFormatOptions = {
            month: '2-digit',
            day: '2-digit',
            year: 'numeric',
            hour12: false,
        };

        return new Intl.DateTimeFormat(navigator.language, options).format(
            date
        );
    }
}
