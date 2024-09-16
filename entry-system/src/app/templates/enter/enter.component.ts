import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';

import { EnterCardComponent } from 'src/app/components/enter/enter-card/enter-card.component';
import { Entry } from 'src/app/models/Entry';

@Component({
    selector: 'app-enter',
    templateUrl: './enter.component.html',
    styleUrls: ['./enter.component.scss'],
    standalone: true,
    imports: [IonicModule, EnterCardComponent],
})
export class EnterComponent implements OnInit {
    public entries: Entry[] = [];

    constructor() {
        this.addNewEntry();
    }

    ngOnInit() {}

    addNewEntry() {
        let new_entry = new Entry(0, '', '', '', 0, '', '', 0, 0, 0, '');
        this.entries.push(new_entry);
    }

    removeEntry(index: number) {
        this.entries.splice(index, 1);
    }
}
