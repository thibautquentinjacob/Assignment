import { Dish } from '../models/Dish';

export class Cart {
    content: {
        [key: string]: {
            dish:   Dish,
            amount: number
        }
    };
    totalPrice:    number;
    productAmount: number;
}
