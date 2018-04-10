<?php

    include_once( "Ingredient.php" );

    class Dish {

        function __construct( string $name,
                              array  $serving,
                              array  $ingredients,
                              string $picture,
                              string $category,
                              float  $price,
                              int    $rating,
                              string $description ) {
            $this->name         = $name;
            $this->ingredients  = $ingredients;
            $this->picture      = $picture;
            $this->category     = $category;
            $this->price        = $price;
            $this->rating       = $rating;
            $this->description  = $description;

            // Apply serving sizes to ingredients
            $this->ingredients = array_map( 
                array( $this, "__mapServings" ),
                $this->ingredients, $serving 
            );

            // Check if dish is vegan and vegetarian
            $this->vegan      = true;
            $this->vegetarian = true;

            foreach ( $this->ingredients as $key => $ingredient ) {
                if ( !$ingredient->isVegan()) {
                    $this->vegan = false;
                }
                if ( !$ingredient->isVegetarian()) {
                    $this->vegetarian = false;
                }
                if ( !$this->vegan && !$this->vegetarian ) {
                    break;
                }
            }
            // Compute calories
            $this->calories = $this->__computeCalories();
        }

        /**
         * Apply serving sizes to quantity (g, L) and calories of an
         * ingredient object.
         *
         * @params Ingredient array, serving size array
         * @return Ingredients with applied sizes
         */
        private function __mapServings( Ingredient $ingredient, 
                                        int $serving ) : Ingredient {
            if ( $serving == 0 ) {
                return $ingredient;
            }
            $quantityFactor = $serving / $ingredient->quantity;
            return new Ingredient(
                $ingredient->name,
                $ingredient->quantity * $quantityFactor,
                $ingredient->calories * $quantityFactor,
                $ingredient->type
            );
        }

        /**
         * Computes the total calory value of the dish by summing up 
         * ingredient calories.
         *
         * @params Nothing
         * @return total calories
         */
        private function __computeCalories() : float {
            // Total calories equals the calories for each dish
            $calories = 0;
            foreach( $this->ingredients as $key => $ingredient ) {
                $calories += $ingredient->getCalories();
            }
            return $calories;
        }

        // Getters
        // ====================================================================
        public function getName() : string {
            return $this->name;
        }

        public function getCategory() : string {
            return $this->category;
        }

        public function getIngredients() : array {
            return $this->ingredients;
        }

        public function isVegan() : bool {
            return $this->vegan;
        }

        public function isVegetarian() : bool {
            return $this->vegetarian;
        }

        public function getCalories() : float {
            return $this->calories;
        }

        public function getPicture() : string {
            return $this->picture;
        }

        public function getPrice() : float {
            return $this->price;
        }

        public function getRating() : int {
            return $this->rating;
        }

        public function getDescription() : string {
            return $this->description;
        }

    }

?>