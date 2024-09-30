import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { tap, take, map, catchError } from 'rxjs/operators';
import { Observable, of } from 'rxjs';

@Injectable({
    providedIn: 'root',
})
export class AuthService {
    private apiUrl = 'http://localhost:8000/api/auth';
    private readonly TOKEN_KEY = 'auth_token';

    constructor(private http: HttpClient) {}

    public login(credentials: { email: string; password: string }) {
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

    public validateToken(): Observable<any> {
        return this.http.get(`${this.apiUrl}/validate`, {
            headers: this.getHeaders(),
        });
    }

    public isLoggedIn(): Observable<boolean> {
        const tokenData = JSON.parse(this.getToken());

        if (!tokenData) {
            return of(false);
        }

        const now = new Date();
        const createdAt = new Date(tokenData.createdAt);
        // const expirationTime = 5 * 60 * 1000;
        const expirationTime = 5 * 1000;
        const isValid = now.getTime() - createdAt.getTime() < expirationTime;

        if (isValid) {
            return of(true);
        } else {
            return this.validateToken().pipe(
                take(1),
                tap((info: any) => {
                    if (info.status === 200) {
                        // console.log('Token is valid');
                    }
                }),
                map(() => true),
                catchError(() => of(false))
            );
        }
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

    public getHeaders(): HttpHeaders {
        let tokenData = JSON.parse(this.getToken());
        let token = tokenData.token;

        return new HttpHeaders().set('Authorization', `Bearer ${token}`);
    }
}
