import { Component, OnInit, Input } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { DishCategory } from '../../models/DishCategory';
import { Dish } from '../../models/Dish';

import { DishesApiService } from '../../services/dishes-api.service';

@Component({
    selector: 'app-dish-list',
    templateUrl: './dish-list.component.html',
    styleUrls: ['./dish-list.component.css']
})
export class DishListComponent implements OnInit {

    @Input() category:   DishCategory;
    dishes:              Dish[];

    constructor( private dishesAPIService: DishesApiService ) {}

    ngOnInit() {
        this.dishesAPIService.fetchDishes( this.category ).subscribe( data => {
            this.dishes = data;
            this.dishes.map( dish => {
                dish.stars = [];
                // Build star rating: 1 for a full star, 0 for an empty one
                // The rating's on a 5 scale
                for ( let i = 0 ; i < 5 ; i++ ) {
                    if ( i <= dish.rating ) {
                        dish.stars.push( 1 );
                    } else {
                        dish.stars.push( 0 );
                    }
                }
                return dish;
            });
        });
    }
}
