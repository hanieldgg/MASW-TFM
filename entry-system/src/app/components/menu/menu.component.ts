import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { Router, RouterLink, RouterLinkActive } from '@angular/router';
import { CommonModule } from '@angular/common';

import { AuthService } from 'src/app/services/auth/auth.service';

@Component({
    selector: 'app-menu',
    templateUrl: './menu.component.html',
    styleUrls: ['./menu.component.scss'],
    imports: [IonicModule, RouterLink, CommonModule, RouterLinkActive],
    standalone: true,
})
export class MenuComponent implements OnInit {
    public appPages = [
        { title: 'Enter Now', url: '/enter', icon: 'star' },
        { title: 'My Entries', url: '/entries', icon: 'reader' },
        { title: 'My Orders', url: '/orders', icon: 'wallet' },
        { title: 'My Account', url: '/account', icon: 'person' },
    ];

    constructor(private authService: AuthService, private router: Router) {}

    ngOnInit() {}

    logout() {
        this.authService.logout();
        this.router.navigate(['/login']);
    }
}
