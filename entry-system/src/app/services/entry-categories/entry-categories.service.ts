import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

var url = 'http://localhost:8000/api/entry-categories';

@Injectable()
export class EntryCategoryService {
    constructor(private http: HttpClient) {}

    public getEntryCategories(): Observable<any> {
        return this.http.get(url);
    }

    public findEntryCategory(id: number): Observable<any> {
        return this.http.get(url + '/' + id);
    }

    public createEntryCategory(params: any): Observable<any> {
        return this.http.post(url, {});
    }

    public updateEntryCategory(params: any, id: number): Observable<any> {
        return this.http.put(url + '/' + id, {});
    }

    public deleteEntryCategory(id: number): Observable<any> {
        return this.http.delete(url + '/' + id);
    }
}
