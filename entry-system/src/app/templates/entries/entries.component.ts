import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';

import { AccordionYearComponent } from 'src/app/components/entries/accordion-year/accordion-year.component';

@Component({
    selector: 'app-entries',
    templateUrl: './entries.component.html',
    styleUrls: ['./entries.component.scss'],
    standalone: true,
    imports: [IonicModule, AccordionYearComponent],
})
export class EntriesComponent implements OnInit {
    constructor() {}

    ngOnInit() {}
}
