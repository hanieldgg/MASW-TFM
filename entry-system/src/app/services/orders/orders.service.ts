import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

var url = 'http://localhost:8000/api/orders';

@Injectable()
export class OrdersService {
    constructor(private http: HttpClient) {}

    public getUsersOrders(params: any): Observable<any> {
        return this.http.post(url, params);
    }
}
