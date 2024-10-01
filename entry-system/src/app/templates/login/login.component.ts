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
        // this.authService.isLoggedIn().subscribe((isLoggedIn) => {
        //     if (isLoggedIn) {
        //         this.router.navigate(['/entries']);
        //     }
        // });

        this.authService.isLoggedIn();
    }

    onSubmit() {
        this.login();
    }

    navigateToRegister() {
        this.router.navigate(['/register']);
    }

    login() {
        let credentials = { email: this.email, password: this.password };

        this.authService.login(credentials).subscribe({
            next: (info) => {
                this.email = '';
                this.password = '';

                this.router.navigate(['/account']);
            },
            error: (error) => {
                console.error('Login failed:', error);
            },
        });
    }
}
