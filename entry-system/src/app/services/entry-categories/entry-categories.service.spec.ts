import { TestBed } from '@angular/core/testing';

import { EntryCategoryService } from './entry-categories.service';

describe('EntryCategoryService', () => {
    let service: EntryCategoryService;

    beforeEach(() => {
        TestBed.configureTestingModule({});
        service = TestBed.inject(EntryCategoryService);
    });

    it('should be created', () => {
        expect(service).toBeTruthy();
    });
});
