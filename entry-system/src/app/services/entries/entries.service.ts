import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

var url = 'http://localhost:8000/api/entries';

@Injectable()
export class EntryService {
    constructor(private http: HttpClient) {}

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
        return this.http.get(url + '/user/' + 1);
    }

    public getUserUnpaidEntries(): Observable<any> {
        return this.http.get(url + '/unpaid/user/' + 1);
    }
}
