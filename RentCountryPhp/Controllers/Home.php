<?php

class Home{
    public function Index(){
        require_once('Views/Home/Index.php');
    }
    
    public function Houses($category = null){
        $productDAO = new ProductDAO();
        $houses;
        if(!$category){
            $houses = $productDAO->GetAllProduct();
        }
        else{
            $houses = $productDAO->GetAllProductByCategory($category);
        }
        
        require_once('Views/Home/Houses.php');
    }
    
    public function House($id){
        $productDAO = new ProductDAO();
        $house = $productDAO->GetProductById($id);
        $image = json_decode($house['image'], true);
        require_once('Views/Home/House.php');
    }
}

