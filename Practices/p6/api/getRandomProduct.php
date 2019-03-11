<?php

  
        
        $products = array();
        
        $product = array();
        $product["product"] = "microfiber beach towel";
        $product["price"] = 40;
        $product["qty"] = 2;
        
        array_push($products,$product);
        
        $product["product"] = "flip flop sandals";
        $product["price"] = 30;
        $product["qty"] = 5;
        
        array_push($products,$product);
        
        $product["product"] = "sun screen 80SPF";
        $product["price"] = 25;
        $product["qty"] = 3;
        
        array_push($products,$product);
        
        $product["product"] = "plastic flying disk";
        $product["price"] = 15;
        $product["qty"] = 4;
        
        array_push($products,$product);
        
        $product["product"] = "beach umbrella";
        $product["price"] = 75;
        $product["qty"] = 1;
        array_push($products,$product);

        echo json_encode($products[rand(0,4)]);

?>