import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { tap, take, map, catchError } from 'rxjs/operators';
import { Observable, of } from 'rxjs';
import { Router, ActivatedRoute } from '@angular/router';

@Injectable({
    providedIn: 'root',
})
export class AuthService {
    private url = 'http://localhost:8000/api/auth';

    constructor(private http: HttpClient, private router: Router) {}

    public login(credentials: { email: string; password: string }) {
        return this.http.post(this.url + '/login', credentials).pipe(
            tap((response: any) => {
                if (response.token) {
                    this.setToken(response.token);
                }
            })
        );
    }

    public register(userData: any) {
        return this.http.post(this.url + '/register', userData);
    }

    public validateToken(): Observable<any> {
        return this.http.get(this.url + '/validate', {
            headers: this.getHeaders(),
        });
    }

    public getProfile(): Observable<any> {
        return this.http.get(this.url + '/profile', {
            headers: this.getHeaders(),
        });
    }

    public updateProfile(user: any): Observable<any> {
        return this.http.post(this.url + '/profile', user, {
            headers: this.getHeaders(),
        });
    }

    public setToken(token: string) {
        if (typeof localStorage !== 'undefined') {
            const now = new Date();
            const tokenData = {
                token: token,
                createdAt: now.toISOString(),
            };
            localStorage.setItem('authToken', JSON.stringify(tokenData));
        }
    }

    public getToken(): any | null {
        if (typeof localStorage !== 'undefined') {
            return localStorage.getItem('authToken');
        }
        return null;
    }

    public logout() {
        localStorage.removeItem('authToken');
    }

    public isLoggedIn(): void {
        const tokenData = JSON.parse(this.getToken());

        if (!tokenData) {
            this.router.navigate(['/login']);
        }

        const now = new Date();
        const createdAt = new Date(tokenData.createdAt);
        // const expirationTime = 5 * 60 * 1000;
        const expirationTime = 5 * 1000;
        const isValid = now.getTime() - createdAt.getTime() < expirationTime;

        if (!isValid) {
            this.validateToken().subscribe({
                next: (info: any) => {
                    if (info.status == 200) {
                        this.setToken(tokenData.token);
                    }
                },
                error: (error: any) => {
                    this.router.navigate(['/login']);
                    localStorage.removeItem('authToken');
                },
            });

            // this.router.navigate(['/login']);
        }

        // this.http.get<boolean>(url + 'api/condition').subscribe(
        //     (result) => {
        //         // Call the callback with the result
        //         callback(result);
        //     },
        //     (error) => {
        //         console.error('Error fetching condition:', error);
        //         callback(false); // or handle the error appropriately
        //     }
        // );
    }

    public getHeaders(): HttpHeaders {
        let tokenData = JSON.parse(this.getToken());
        let token = tokenData.token;

        return new HttpHeaders().set('Authorization', `Bearer ${token}`);
    }
}
