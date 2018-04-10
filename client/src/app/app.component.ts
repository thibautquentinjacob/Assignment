import { Component, AfterViewInit } from '@angular/core';
import { MzNavbarModule } from 'ng2-materialize';
import { SectionComponent } from './components/section/section.component';
import { DishListComponent } from './components/dish-list/dish-list.component';

import { CartService } from './services/cart.service';
import { MzModalModule } from 'ng2-materialize';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent {
    title        = 'app';
    dishesInCart = false;
    amountInCart:  number;
    cartContent:   any[];
    cartPrice:     number;

    constructor( private cartService: CartService ) {
        this.cartContent = [];
        this.cartPrice   = 0;
        this.amountInCart = 0;
        // Subscribe to the cart service event returning the amount of items in
        // the cart on 'add' or 'remove'
        cartService.cartCountStream.subscribe( count => {
            this.amountInCart = count;
            this.dishesInCart = count > 0;
        });
        // Receive cart content updates
        cartService.cartContentStream.subscribe( data => {
            this.cartContent = [];
            Object.keys( data.content ).map( entry => {
                this.cartContent.push({
                    amount: data.content[entry].amount,
                    dish:   data.content[entry].dish
                });
            });
            this.cartPrice = data.totalPrice;
        });
    }

    /**
     * Handler called when the amount of dishes is updated in the cart. Update
     * the amount of dishes in the cart.
     *
     * @params dish
     * @return nothing
     */
    changeHandler( value ) {
        this.cartService.updateDish( value.dish, value.amount );
    }
}
