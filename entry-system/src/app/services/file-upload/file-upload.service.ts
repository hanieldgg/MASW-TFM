import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { AuthService } from '../auth/auth.service';

@Injectable({
    providedIn: 'root',
})
export class FileUploadService {
    private url = 'http://localhost:8000/api/upload';
    private headers: any;

    constructor(private http: HttpClient, private authService: AuthService) {
        this.headers = this.authService.getHeaders();
    }

    public upload(file: any, entryID: any): Observable<any> {
        const formData = new FormData();
        formData.append('file', file, file.name);
        formData.append('entryID', entryID);

        return this.http.post(this.url, formData, {
            headers: this.headers,
        });
    }

    public listEntryFiles(entryID: any): Observable<any> {
        return this.http.post(
            this.url + '/list',
            { entryID: entryID },
            {
                headers: this.headers,
            }
        );
    }
}
