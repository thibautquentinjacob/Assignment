import { Component, OnInit, Input } from '@angular/core';
import { RatingComponent } from '../rating/rating.component';
import { MzTooltipModule } from 'ng2-materialize';

import { CartService } from '../../services/cart.service';

import { Dish } from '../../models/Dish';

@Component({
    selector: 'app-dish',
    templateUrl: './dish.component.html',
    styleUrls: ['./dish.component.css']
})
export class DishComponent implements OnInit {

    @Input() dish: Dish;

    // Connect to the cart service
    constructor( private cartService: CartService ) {}

    ngOnInit() {}

    addToCart( dish: Dish ) {
        console.log( dish );
        console.log( 'adding to cart' );
        this.cartService.addDish( dish );
    }
}
