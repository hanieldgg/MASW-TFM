import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';

@Component({
    selector: 'app-menu',
    templateUrl: './menu.component.html',
    styleUrls: ['./menu.component.scss'],
    imports: [IonicModule, RouterLink, CommonModule],
    standalone: true,
})
export class MenuComponent implements OnInit {
    public appPages = [{ title: 'Entries', url: '/entries', icon: 'reader' }];

    constructor() {}

    ngOnInit() {}
}
