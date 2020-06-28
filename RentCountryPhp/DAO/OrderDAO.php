<?php
class OrderDao{
    
    public static function AddOrder($name, $mobile, $email){
        
        $db = Db::getConnection();
        
        $sql = 'insert into neworder(name, mobile, email) values(:name, :mobile, :email)';
//        $sql = 'insert into user(name, email, password) values(:name, :email, :password)';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function GetOrders(){
        
        $db = Db::getConnection();
        $orderList = array();
        $sql = 'select * from neworder';
        
        $result = $db->query($sql);
        
        
        $i = 0;
        while($row = $result->fetch()){
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['name'] = $row['name'];
            $orderList[$i]['mobile'] = $row['mobile'];
            $orderList[$i]['email'] = $row['email'];
            $i++;
        }
        
        return $orderList;
    }
    
    public static function DeleteById($id){
        
        $db = Db::getConnection();
        $sql = 'delete from neworder where id = '.$id;
        return $db->exec($sql);
    }
}