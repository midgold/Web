<?php

class Cart {

    public function AddToCartAjax($productid) {
        $productlist = array();
        if (isset($_SESSION['cart_product_id']))
            $productlist = $_SESSION['cart_product_id'];
        if (array_key_exists($productid, $productlist)) {
            echo count($_SESSION['cart_product_id']);
            die();
        } else
            $productlist[$productid] = 1;
        $_SESSION['cart_product_id'] = $productlist;        
    }
    
    public function CartProductCount() {
        $count_product = count($_SESSION['cart_product_id']);
        echo $count_product;
    }
    
    public function ShopCart() {
        $productsList = array();
        $productDAO = new ProductDAO();
        foreach ($_SESSION['cart_product_id'] as $key => $value) {            
            $productsList[] = $productDAO->GetProductById($key);
        }
        require_once('Views/Cart/ShopCart.php');
    }

    public function DeleteProductFromSessionAjax($id) {
        unset($_SESSION['cart_product_id'][$id]);
    }

}    