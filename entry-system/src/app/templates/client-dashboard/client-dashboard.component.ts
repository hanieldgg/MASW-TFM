import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { Router, NavigationEnd } from '@angular/router';

import { MenuComponent } from 'src/app/components/menu/menu.component';

import { AuthService } from 'src/app/services/auth/auth.service';

@Component({
    selector: 'app-client-dashboard',
    standalone: true,
    imports: [IonicModule, MenuComponent],
    providers: [AuthService],
    templateUrl: './client-dashboard.component.html',
    styleUrls: ['./client-dashboard.component.scss'],
})
export class ClientDashboardComponent implements OnInit {
    public user: any;

    constructor(private router: Router, private authService: AuthService) {}

    ngOnInit() {
        this.router.events.subscribe((event) => {
            if (event instanceof NavigationEnd) {
                this.checkAuthentication();
            }
        });
    }

    checkAuthentication() {
        if (!this.authService.isLoggedIn()) {
            this.router.navigate(['/login']);
        }
    }
}
