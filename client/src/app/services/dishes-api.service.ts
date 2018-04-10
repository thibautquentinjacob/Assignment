import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { Dish } from '../models/Dish';
import { DishCategory } from '../models/DishCategory';

@Injectable()
export class DishesApiService {

    // Modify the route to point to your local installation
    API_ROUTE = 'http://localhost:8888/Digifood-assignment/API/menu/read';

    constructor( private http: HttpClient ) { }

    fetchDishes( category: DishCategory ): Observable<Dish[]> {
        const dishes: Dish[] = [];
        return this.http.get(
            this.API_ROUTE
        ).pipe().map( data => {
            const dishNames = Object.keys( data );
            for ( let i = 0 ; i < dishNames.length ; i++ ) {
                const dish = data[dishNames[i]];
                if ( dish.category === category ) {
                    dishes.push( dish );
                }
            }
            return dishes;
        });
    }

}
