import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { FormsModule } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';

import { AuthService } from 'src/app/services/auth/auth.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
    standalone: true,
    imports: [IonicModule, FormsModule],
    providers: [AuthService],
})
export class LoginComponent implements OnInit {
    public email: string = '';
    public password: string = '';
    public login_status: boolean = false;

    constructor(private authService: AuthService, private router: Router) {}

    ngOnInit() {
        this.login_status = this.authService.isLoggedIn();

        if (this.login_status) {
            this.router.navigate(['/entries']);
        }
    }

    onSubmit() {
        this.login();
    }

    login() {
        let credentials = { email: this.email, password: this.password };

        this.authService.login(credentials).subscribe({
            next: (info) => {
                console.log('Login successful');
                this.router.navigate(['/entries']);
            },
            error: (error) => {
                console.error('Login failed:', error);
            },
        });
    }
}
