<?php
    // Authorize access to the API from any domain
    header( "Access-Control-Allow-Origin: *" );
    // We send JSON back
    header( "Content-Type: application/json; charset=UTF-8" );

    // Dependencies
    include_once( "../model/Ingredient.php" );
    include_once( "../model/Dish.php" );

    function createIngredients() : array {
        $ingredients = array(
            "Pomme"         => new Ingredient( "Pomme",         100, 52,  "FRUIT" ),
            "Sucre"         => new Ingredient( "Sucre",         100, 387, "OTHER" ),
            "Beurre"        => new Ingredient( "Beurre",        100, 717, "DAIRY" ),
            "Patte"         => new Ingredient( "Patte",         100, 558, "OTHER" ),
            "Boeuf"         => new Ingredient( "Boeuf",         100, 250, "MEAT" ),
            "Porc"          => new Ingredient( "Porc",          100, 242, "MEAT" ),
            "Poulet"        => new Ingredient( "Poulet",        100, 239, "MEAT" ),
            "Saumon"        => new Ingredient( "Saumon",        100, 120, "MEAT" ),
            "Lait"          => new Ingredient( "Lait",          100, 42,  "DAIRY" ),
            "Oeuf"          => new Ingredient( "Oeuf",          100, 155, "MEAT" ),
            "Carotte"       => new Ingredient( "Carotte",       100, 41,  "VEGETABLE" ),
            "Oignon"        => new Ingredient( "Oignon",        100, 40,  "VEGETABLE" ),
            "Champignon"    => new Ingredient( "Champignon",    100, 22,  "OTHER" ),
            "Crème fraiche" => new Ingredient( "Crème fraiche", 100, 193, "DAIRY" ),
            "Citron"        => new Ingredient( "Citron",        100, 29,  "FRUIT" ),
            "Sel"           => new Ingredient( "Sel",           100, 0,   "OTHER" ),
            "Poivre"        => new Ingredient( "Poivre",        100, 40,  "OTHER" ),
            "Vin blanc"     => new Ingredient( "Vin blanc",     100, 82,  "OTHER" ),
            "Vin rouge"     => new Ingredient( "Vin rouge",     100, 82,  "OTHER" ),
            "Miel"          => new Ingredient( "Miel",          100, 304, "OTHER" ),
            "Moutarde"      => new Ingredient( "Moutarde",      100, 66,  "OTHER" ),
            "Tomate"        => new Ingredient( "Tomate",        100, 66,  "VEGETABLE" ),
            "Huile d'olive" => new Ingredient( "Huile d'olive", 100, 66,  "VEGETABLE" ),
            "Ail"           => new Ingredient( "Ail",           100, 149, "VEGETABLE" ),
            "Vinaigre"      => new Ingredient( "Vinaigre",      100, 18, "OTHER" ),
            "Betterave"     => new Ingredient( "Betterave",     100, 19, "VEGETABLE" ),
            "Coriandre"     => new Ingredient( "Coriandre",     100, 23, "VEGETABLE" ),
            "Tofu"          => new Ingredient( "Tofu",          100, 76, "VEGETABLE" ),
            "Chapelure"     => new Ingredient( "Chapelure",     100, 395, "OTHER" ),
        );
        return $ingredients;
    }

    function createDishes( array $ingredients ) : array {
        $dishes = array(
            "Tarte tatin" => new Dish( 
                "Tarte tatin", array(
                    100/6, 50/6, 1000/6, 200/6
                ), array (
                    $ingredients["Sucre"], $ingredients["Beurre"], 
                    $ingredients["Pomme"], $ingredients["Patte"]
                ), "https://image.afcdn.com/recipe/20140810/31858_w600.jpg",
                "DESSERT",
                10.49,
                2,
                "La tarte Tatin est une tarte aux pommes caramélisées au sucre et au beurre, la pâte disposée au-dessus de la garniture. Après cuisson au four, elle est renversée sur un plat et servie tiède avec un peu de crème fraîche ou fouettée."
            ),
            "Blanquette de veau" => new Dish( 
                "Blanquette de veau", array(
                    1000/4, 100/4, 200/4, 100/4, 200/4, 10/4, 5/4, 5/4, 250/4
                ), array (
                    $ingredients["Boeuf"], $ingredients["Carotte"], 
                    $ingredients["Oignon"], $ingredients["Champignon"],
                    $ingredients["Crème fraiche"], $ingredients["Citron"],
                    $ingredients["Sel"], $ingredients["Poivre"],
                    $ingredients["Vin blanc"]
                ), "https://image.afcdn.com/recipe/20131223/2265_w600.jpg",
                "MAIN_COURSE",
                21,
                4,
                "La blanquette de veau est un plat complet traditionnel français à base de viande de veau bouillie, de carottes et de sauce au beurre."
            ),
            "Roti de porc" => new Dish(
                "Roti de porc", array(
                    1200/6, 20/6, 5/6, 5/6, 40/6, 5/6
                ), array (
                    $ingredients["Porc"], $ingredients["Miel"], 
                    $ingredients["Poivre"], $ingredients["Sel"],
                    $ingredients["Oignon"], $ingredients["Moutarde"],
                ), "https://image.afcdn.com/recipe/20160331/66959_w600.jpg",
                "MAIN_COURSE",
                15,
                3,
                "Le rôti de porc est un plat principal à base de porc braisé, il est généralement accompagné de pommes de terre et d'autres légumes qui ont été cuits au four dans le jus de la viande."
            ),
            "Saumon en papillote" => new Dish(
                "Saumon en papillote", array(
                    800/4, 1000/4, 100/4, 10/4, 10/4, 5/4, 5/4
                ), array (
                    $ingredients["Saumon"], $ingredients["Tomate"], 
                    $ingredients["Champignon"], $ingredients["Huile d'olive"],
                    $ingredients["Citron"], $ingredients["Sel"],
                    $ingredients["Poivre"]
                ), "https://image.afcdn.com/recipe/20150922/57763_w600.jpg",
                "MAIN_COURSE",
                18,
                5,
                "Saumon cuit à la vapeur"
            ),
            "Boeuf Bourguignon" => new Dish(
                "Boeuf Bourguignon", array(
                    800/6, 100/6, 20/6, 1000/6, 40/6, 10/6, 250/6, 5/6, 5/6
                ), array (
                    $ingredients["Boeuf"], $ingredients["Porc"], 
                    $ingredients["Huile d'olive"], $ingredients["Vin rouge"],
                    $ingredients["Oignon"], $ingredients["Ail"],
                    $ingredients["Champignon"], $ingredients["Sel"],
                    $ingredients["Poivre"]
                ), "https://cac.img.pmdstatic.net/fit/http.3A.2F.2Fwww.2Ecuisineactuelle.2Efr.2Fvar.2Fcui.2Fstorage.2Fimages.2Frecettes-de-cuisine.2Fviande.2Fboeuf.2Fboeuf-bourguignon-facile-245438.2F1088232-2-fre-FR.2Fboeuf-bourguignon-facile.2Ejpg/748x372/quality/80/crop-from/center/boeuf-bourguignon-facile.jpeg",
                "MAIN_COURSE",
                14,
                2,
                "Le bœuf bourguignon est une recette de cuisine d'estouffade de bœuf, traditionnelle de la cuisine bourguignonne, cuisinée au vin rouge de Bourgogne, avec une garniture de champignons, de petits oignons et de lardons. Les variations d'accompagnement sont multiples avec, par exemple, des pommes de terre, carottes, haricots verts, pâtes…"
            ),
            "Méli mélo de betterave" => new Dish(
                "Méli mélo de betterave", array(
                    2/4, 50/4, 5/4, 5/4, 5/4, 600/4
                ), array (
                    $ingredients["Vinaigre"], $ingredients["Coriandre"], 
                    $ingredients["Huile d'olive"], $ingredients["Sel"],
                    $ingredients["Poivre"], $ingredients["Betterave"]
                ), "https://image.afcdn.com/recipe/20180209/77469_w420h344c1cx555cy740cxt0cyt0cxb1110cyb1480.jpg",
                "STARTER",
                9,
                3,
                "Méli mélo de betterave en croûte de sel et burrata"
            ),
            "Tofu pané" => new Dish(
                "Tofu pané", array(
                    100/2, 30/2, 10/2, 5/2, 5/2
                ), array (
                    $ingredients["Tofu"], $ingredients["Chapelure"], 
                    $ingredients["Huile d'olive"], $ingredients["Sel"],
                    $ingredients["Poivre"]
                ), "https://image.afcdn.com/recipe/20160317/33044_w420h344c1cx400cy266.jpg",
                "STARTER",
                8,
                2,
                "Tofu à la poile"
            )
        );
        return $dishes;
    }

    // Create the list of ingredients
    $ingredients = createIngredients();
    // Create the list of dishes
    $dishes      = createDishes( $ingredients );
    echo( json_encode( $dishes ));
?>