import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { AuthService } from '../auth/auth.service';

var url = 'http://localhost:8000/api/entry-categories';

@Injectable()
export class EntryCategoryService {
    private headers: any;

    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

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

    public getFullEntryCategory(id: number): Observable<any> {
        return this.http.get(url + '/full/' + id, { headers: this.headers });
    }
}
