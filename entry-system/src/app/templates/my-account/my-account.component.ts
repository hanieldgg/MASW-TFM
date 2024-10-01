import { Component, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
import { FormsModule } from '@angular/forms';

import { AuthService } from 'src/app/services/auth/auth.service';

@Component({
    standalone: true,
    imports: [FormsModule, IonicModule],
    selector: 'app-my-account',
    providers: [AuthService],
    templateUrl: './my-account.component.html',
    styleUrls: ['./my-account.component.scss'],
})
export class MyAccountComponent implements OnInit {
    public user = {
        email: '',
        name: '',
        company: '',
        address: '',
        logo_url: '',
    };

    constructor(private authService: AuthService) {}

    ngOnInit() {
        this.authService.getProfile().subscribe({
            next: (info) => {
                if (info.status == 200) {
                    console.log(info.data);
                    this.user = info.data;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    onSubmit() {
        this.authService.updateProfile(this.user).subscribe({
            next: (info) => {
                if (info.status == 200) {
                    console.log('Updated');
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }
}
