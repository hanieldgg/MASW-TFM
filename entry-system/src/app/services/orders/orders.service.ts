import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { AuthService } from '../auth/auth.service';

@Injectable()
export class OrdersService {
    private headers: any;
    private url = 'http://localhost:8000/api/orders';

    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

    public getUsersOrders(params: any): Observable<any> {
        return this.http.post(this.url, params, { headers: this.headers });
    }
}
