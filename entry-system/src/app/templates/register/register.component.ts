import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { AuthService } from 'src/app/services/auth/auth.service';
@Component({
    selector: 'app-register',
    standalone: true,
    providers: [AuthService],
    imports: [IonicModule, FormsModule],
    templateUrl: './register.component.html',
    styleUrls: ['./register.component.scss'],
})
export class RegisterComponent implements OnInit {
    user = {
        email: '',
        password: '',
        name: '',
        company: '',
        address: '',
    };

    constructor(private authService: AuthService, private router: Router) {}

    ngOnInit() {}

    navigateToLogin() {
        this.router.navigate(['/login']);
    }

    onSubmit() {
        this.authService.register(this.user).subscribe({
            next: (info: any) => {
                if (info.status == 200) {
                    this.user = {
                        email: '',
                        password: '',
                        name: '',
                        company: '',
                        address: '',
                    };

                    this.authService.setToken(info.token);

                    this.router.navigate(['/account']);
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }
}
