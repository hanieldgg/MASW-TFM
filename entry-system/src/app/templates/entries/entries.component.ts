import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { Router, ActivatedRoute } from '@angular/router';
import { filter } from 'rxjs/operators';

import { AccordionYearComponent } from 'src/app/components/entries/accordion-year/accordion-year.component';

import { EntryService } from 'src/app/services/entries/entries.service';

@Component({
    selector: 'app-entries',
    templateUrl: './entries.component.html',
    styleUrls: ['./entries.component.scss'],
    standalone: true,
    providers: [EntryService],
    imports: [IonicModule, AccordionYearComponent, CommonModule],
})
export class EntriesComponent implements OnInit {
    public entries: any = [];
    public years: any;

    constructor(
        private entryService: EntryService,
        private router: Router,
        private activatedRoute: ActivatedRoute
    ) {}

    ngOnInit() {
        this.activatedRoute.params.subscribe((params) => {
            this.executeAfterRouteChange(params);
        });
    }

    executeAfterRouteChange(params: any) {
        this.fetchUserEntries();
    }

    fetchUserEntries() {
        this.entryService.getUserEntries().subscribe({
            next: (info) => {
                if (info.status == 200) {
                    this.entries = info.data;
                    this.prepEntriesObject(this.entries);
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    prepEntriesObject(entries: any) {
        this.years = Object.keys(entries);
    }
}
