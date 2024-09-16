import { Component, OnInit, Input } from '@angular/core';
import { IonicModule } from '@ionic/angular';

@Component({
    selector: 'app-accordion-payment-status',
    templateUrl: './accordion-payment-status.component.html',
    styleUrls: ['./accordion-payment-status.component.scss'],
    standalone: true,
    imports: [IonicModule],
})
export class AccordionPaymentStatusComponent implements OnInit {
    @Input() status: string = '';
    @Input() total_entries: number = 0;
    @Input() key: number = 0;

    constructor() {}

    ngOnInit() {}
}
