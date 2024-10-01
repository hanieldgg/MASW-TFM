import { Injectable } from '@angular/core';
import {
    Router,
    ActivatedRouteSnapshot,
    RouterStateSnapshot,
} from '@angular/router';

import { AuthService } from '../services/auth/auth.service';

@Injectable({
    providedIn: 'root',
})
export class AuthGuardService {
    constructor(private authService: AuthService, private router: Router) {}

    canActivate(
        route: ActivatedRouteSnapshot,
        state: RouterStateSnapshot
    ): boolean {
        return this.checkLogin(state.url);
    }

    checkLogin(url: string): boolean {
        if (this.authService.getToken()) {
            return true;
        } else {
            // Navigate to the login page with extras
            this.router.navigate(['/login']);
            return false;
        }
    }
}
