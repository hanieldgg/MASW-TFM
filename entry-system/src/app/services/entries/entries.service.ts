import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { AuthService } from '../auth/auth.service';

var url = 'http://localhost:8000/api/entries';

@Injectable()
export class EntryService {
    private headers: any;
    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

    public getEntries(): Observable<any> {
        return this.http.get(url);
    }

    public findEntry(id: number): Observable<any> {
        return this.http.get(url + '/' + id);
    }

    public createEntry(params: any): Observable<any> {
        return this.http.post(url, params);
    }

    public updateEntry(params: any, id: number): Observable<any> {
        return this.http.put(url + '/' + id, {});
    }

    public deleteEntry(id: number): Observable<any> {
        return this.http.delete(url + '/' + id);
    }

    public getUserEntries(): Observable<any> {
        return this.http.get(url + '/user/all', { headers: this.headers });
    }

    public getUserUnpaidEntries(): Observable<any> {
        return this.http.get(url + '/unpaid/user/' + 1);
    }
}
