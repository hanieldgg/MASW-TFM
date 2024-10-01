import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { AuthService } from '../auth/auth.service';

@Injectable()
export class EntryCategoryService {
    private url = 'http://localhost:8000/api/entry-categories';
    private headers: any;

    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

    public getEntryCategories(): Observable<any> {
        return this.http.get(this.url, { headers: this.headers });
    }

    public findEntryCategory(id: number): Observable<any> {
        return this.http.get(this.url + '/' + id, { headers: this.headers });
    }

    public createEntryCategory(params: any): Observable<any> {
        return this.http.post(this.url, {}, { headers: this.headers });
    }

    public updateEntryCategory(params: any, id: number): Observable<any> {
        return this.http.put(
            this.url + '/' + id,
            {},
            { headers: this.headers }
        );
    }

    public deleteEntryCategory(id: number): Observable<any> {
        return this.http.delete(this.url + '/' + id, { headers: this.headers });
    }

    public getFullEntryCategory(id: number): Observable<any> {
        return this.http.get(this.url + '/full/' + id, {
            headers: this.headers,
        });
    }
}
