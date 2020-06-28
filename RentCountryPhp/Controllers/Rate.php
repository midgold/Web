<?php

class Rate{
    
    public function RatingAjax($rating, $productid){
        
        $rateDao = new RateDAO();
        $rateDao->AddRate($_SESSION['userid'], $productid, $rating);
    }
    
}