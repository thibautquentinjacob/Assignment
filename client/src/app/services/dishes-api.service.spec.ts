import { TestBed, inject } from '@angular/core/testing';

import { DishesApiService } from './dishes-api.service';

describe('DishesApiService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [DishesApiService]
    });
  });

  it('should be created', inject([DishesApiService], (service: DishesApiService) => {
    expect(service).toBeTruthy();
  }));
});
