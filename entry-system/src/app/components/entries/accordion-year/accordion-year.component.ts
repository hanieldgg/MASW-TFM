import { Component, OnInit, Input } from '@angular/core';
import { IonicModule } from '@ionic/angular';

import { AccordionPaymentStatusComponent } from '../accordion-payment-status/accordion-payment-status.component';

@Component({
    selector: 'app-accordion-year',
    templateUrl: './accordion-year.component.html',
    styleUrls: ['./accordion-year.component.scss'],
    standalone: true,
    imports: [IonicModule, AccordionPaymentStatusComponent],
})
export class AccordionYearComponent implements OnInit {
    @Input() year: number = 0;
    @Input() entries: any;
    @Input() key: number = 0;
    public statuses: string[] = ['winner', 'judged', 'paid', 'unpaid'];
    public total_entries: number = 0;

    constructor() {}

    ngOnInit() {
        this.statuses.forEach((status) => {
            this.total_entries += this.entries[status].length;
        });
    }
}
