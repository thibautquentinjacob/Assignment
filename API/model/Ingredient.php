<?php

    class Ingredient {

        function __construct( string         $name,
                              float          $quantity,
                              float          $calories,
                              string         $type ) {
            $this->name       = $name;
            $this->quantity   = $quantity;
            $this->calories   = $calories;
            $this->type       = $type;
            $this->vegan      = $this->type != "MEAT" && $this->type != "DAIRY";
            $this->vegetarian = $this->type != "MEAT";
        }

        // Getters
        // ====================================================================
        public function getName() : string {
            return $this->name;
        }

        public function getType() : string {
            return $this->type;
        }

        public function getQuantity() : float {
            return $this->quantity;
        }

        public function getCalories() : float {
            return $this->calories;
        }

        public function isVegan() : bool {
            return $this->vegan;
        }

        public function isVegetarian() : bool {
            return $this->vegetarian;
        }

    }

?>