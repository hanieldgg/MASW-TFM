import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { tap } from 'rxjs/operators';

@Injectable({
    providedIn: 'root',
})
export class AuthService {
    private apiUrl = 'http://localhost:8000/api/auth';
    private readonly TOKEN_KEY = 'auth_token';

    constructor(private http: HttpClient) {}

    public login(credentials: { email: string; password: string }) {
        // return this.http.post(`${this.apiUrl}/login`, credentials);

        return this.http.post(`${this.apiUrl}/login`, credentials).pipe(
            tap((response: any) => {
                if (response.token) {
                    this.setToken(response.token);
                }
            })
        );
    }

    public register(userData: any) {
        return this.http.post(`${this.apiUrl}/register`, userData);
    }

    public isLoggedIn(): boolean {
        let tokenData = JSON.parse(this.getToken());

        if (!tokenData) {
            return false;
        }

        let now: any = new Date();
        let createdAt: any = new Date(tokenData.createdAt);
        let expirationTime = 5 * 60 * 1000;
        let isValid = now - createdAt < expirationTime;

        if (isValid) {
            return true;
        } else {
            localStorage.removeItem('authToken');
            return false;
        }

        // return this.getToken() !== null;
    }

    public setToken(token: string) {
        if (typeof localStorage !== 'undefined') {
            const now = new Date();
            const tokenData = {
                token: token,
                createdAt: now.toISOString(),
            };
            localStorage.setItem('authToken', JSON.stringify(tokenData));

            // localStorage.setItem(this.TOKEN_KEY, token);
        }
    }

    public getToken(): any | null {
        if (typeof localStorage !== 'undefined') {
            return localStorage.getItem('authToken');
            // return localStorage.getItem(this.TOKEN_KEY);
        }
        return null;
    }

    public getHeaders(): HttpHeaders {
        let token = this.getToken();
        return new HttpHeaders().set('Authorization', `Bearer ${token}`);
    }
}
