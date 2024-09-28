import { TestBed } from '@angular/core/testing';

import { BraintreeServiceService } from './braintree-service.service';

describe('BraintreeServiceService', () => {
  let service: BraintreeServiceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(BraintreeServiceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
