import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { AuthService } from '../auth/auth.service';

@Injectable({
    providedIn: 'root',
})
export class BraintreeService {
    private headers: any;
    private url = 'http://localhost:8000/api';

    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

    getClientToken(): Observable<{ clientToken: string }> {
        return this.http.get<{ clientToken: string }>(
            this.url + '/client_token',
            { headers: this.headers }
        );
    }

    processPayment(
        nonce: string,
        amount: string,
        entries: any
    ): Observable<any> {
        return this.http.post(
            this.url + '/checkout',
            {
                paymentMethodNonce: nonce,
                amount: amount,
                entries: entries,
            },
            { headers: this.headers }
        );
    }

    public checkoutEntry(entryID: number): Observable<any> {
        return this.http.post(
            this.url + '/checkout/entry',
            {
                entryID: entryID,
            },
            { headers: this.headers }
        );
    }
}
