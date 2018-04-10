import { Ingredient } from './Ingredient';
import { DishCategory } from './DishCategory';

export interface Dish {
    name:        string;
    ingredients: Ingredient[];
    picture:     string;
    vegan:       boolean;
    vegetarian:  boolean;
    calories:    number;
    category:    DishCategory;
    rating:      number;
    stars:       Array<number>;
    price:       number;
    description: string;
}
