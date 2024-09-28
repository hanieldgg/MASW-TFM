import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
    providedIn: 'root',
})
export class BraintreeService {
    private url = 'http://localhost:8000/api';

    constructor(private http: HttpClient) {}

    getClientToken(): Observable<{ clientToken: string }> {
        return this.http.get<{ clientToken: string }>(
            this.url + '/client_token'
        );
    }

    processPayment(nonce: string, amount: string): Observable<any> {
        return this.http.post(this.url + '/checkout', {
            paymentMethodNonce: nonce,
            amount: amount,
        });
    }

    public checkoutEntry(entryID: number): Observable<any> {
        return this.http.post(this.url + '/checkout/entry', {
            entryID: entryID,
        });
    }
}
