<?php
class RateDAO{
    public $dbclass;
    public $db;
    
    public function __construct() {
        $this->dbclass = new Db();
        $this->db = $this->dbclass->getConnection();
    }
    
    public function AddRate($userid, $productid, $rating) {
        $sql = 'insert into rate(userid, productid, rating) values(:productid, :userid, :rating)';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':userid', $userid, PDO::PARAM_INT);
        $result->bindParam(':productid', $productid, PDO::PARAM_INT);
        $result->bindParam(':rating', $rating, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    public function GetAllRateForProduct($productid) {
        $sql = 'select from rate where productid = :productid';
        
        $result = $this->db->prepare($sql);
        $ratingList = array(); 
        
        $result->bindParam(':productid', $productid, PDO::PARAM_INT);        
        $result->execute();
        $i = 0;
        while ($row = $result->fetch()){
            $ratingList[$i]['userid'] = $row[$i]['userid'];
            $ratingList[$i]['productid'] = $row[$i]['productid'];
            $ratingList[$i]['rating'] = $row[$i]['rating'];
            $i++;
        }
        return $ratingList;
    }
    
    public function GetAllRateForUser($userid) {
        $sql = 'select from rate where userid = :userid';
        
        $result = $this->db->prepare($sql);
        $ratingList = array(); 
        
        $result->bindParam(':userid', $productid, PDO::PARAM_INT);        
        $result->execute();
        $i = 0;
        while ($row = $result->fetch()){
            $ratingList[$i]['userid'] = $row[$i]['userid'];
            $ratingList[$i]['productid'] = $row[$i]['productid'];
            $ratingList[$i]['rating'] = $row[$i]['rating'];
            $i++;
        }
        return $ratingList;
    }
    
    public function ProductRate($productid) {
        $ratingList = GetAllRateForProduct($productid);
        $productDao = new ProductDAO();
        $rate = 0;
        $i = 0;
        while ($rating = $ratingList[$i]['rating']){
            $rate.= $rating;
        }
        $rate = $rate / count($ratingList);
        $productDao->AddRate($productid, $rate);
    }
    
}

