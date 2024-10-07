import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { AuthService } from '../auth/auth.service';

@Injectable()
export class EntryService {
    private url = 'http://localhost:8000/api/entries';
    private headers: any;

    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

    // public getEntries(): Observable<any> {
    //     return this.http.get(this.url, { headers: this.headers });
    // }

    // public findEntry(id: number): Observable<any> {
    //     return this.http.get(this.url + '/' + id, { headers: this.headers });
    // }

    public createEntry(params: any): Observable<any> {
        return this.http.post(this.url, params, { headers: this.headers });
    }

    // public updateEntry(params: any, id: number): Observable<any> {
    //     return this.http.put(
    //         this.url + '/' + id,
    //         {},
    //         { headers: this.headers }
    //     );
    // }

    public deleteEntry(id: number): Observable<any> {
        return this.http.delete(this.url + '/' + id, { headers: this.headers });
    }

    public getUserEntries(): Observable<any> {
        return this.http.get(this.url + '/user/all', { headers: this.headers });
    }

    public getUserUnpaidEntries(): Observable<any> {
        return this.http.get(this.url + '/unpaid/user', {
            headers: this.headers,
        });
    }
}
