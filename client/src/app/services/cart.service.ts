import { Injectable } from '@angular/core';
import { Subject } from 'rxjs/Subject';
import { Dish } from '../models/Dish';
import { Cart } from '../models/Cart';

import { MzToastModule, MzToastService } from 'ng2-materialize';

@Injectable()
export class CartService {

    cart: Cart;
    // Used to stream cart events to components
    private observableCartCount   = new Subject<number>();
    cartCountStream               = this.observableCartCount.asObservable();
    private observableCartContent = new Subject<Cart>();
    cartContentStream             = this.observableCartContent.asObservable();

    constructor( private toastService: MzToastService ) {
        this.cart = {
            content:       {},
            totalPrice:    0,
            productAmount: 0
        };
    }

    /**
     * Add a dish to the cart and send update to the subscribed components
     *
     * @params dish
     * @return Nothing
     */
    addDish( dish: Dish ) {
        console.log( 'Adding dish' );
        // If the dish is already in the cart, increase amount and add the dish
        // price to the total cart price
        if ( this.cart.content[dish.name]) {
            this.cart.content[dish.name].amount++;
            this.cart.totalPrice += dish.price;
        // Otherwise, create the dish entry and add its price to the total price
        } else {
            this.cart.content[dish.name] = {
                dish: dish,
                amount: 1
            };
            this.cart.totalPrice += dish.price;
        }
        this.cart.productAmount++;
        this.toastService.show( dish.name + ' ajouté au panier', 4000, 'green' );
        this.observableCartCount.next( this.cart.productAmount );
        this.observableCartContent.next( this.cart );
    }

    /**
     * Update a dish entry to the input amount and send update to the subscribed
     * components
     *
     * @params dish and amount
     * @return Nothing
     */
    updateDish( dish: Dish, amount: number ) {
        if ( this.cart.content[dish.name]) {
            this.cart.totalPrice += dish.price * ( amount - this.cart.content[dish.name].amount );
            this.cart.productAmount += ( amount - this.cart.content[dish.name].amount );
            this.cart.content[dish.name].amount = amount;
            this.observableCartCount.next( this.cart.productAmount );
            this.observableCartContent.next( this.cart );
        }
    }

    /**
     * Remove a dish from the cart by name and send update to the subscribed
     * components
     *
     * @params dish
     * @return nothing
     */
    removeDish( dish: Dish ) {
        console.log( 'removing dish' );
        // If the dish is already in the cart, decrease amount and sub the dish
        // price from the total cart price
        if ( this.cart.content[dish.name]) {
            this.cart.content[dish.name].amount--;
            this.cart.totalPrice -= dish.price;
            this.cart.productAmount--;
            this.toastService.show( dish.name + ' retiré du panier', 4000, 'red' );
            this.observableCartCount.next( this.cart.productAmount );
            this.observableCartContent.next( this.cart );
        // Otherwise, well ...
        } else {
            console.log( 'Can\'t remove a dish which is not in the cart', dish );
        }
    }
}
