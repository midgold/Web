<?php

class Autorization{
    
    public function CheckGuest(){
        $ip = $_SESSION['user_ip'];
        $userip = $_SERVER['REMOTE_ADDR'];
        if(isset($_SESSION['userid'])){            
            if($ip == $userip){
                return false;
            }
        }
        return true;
    }
    
    public function CheckLogInData($login, $password){
        $userDao = new UserDAO();
        $userId = $userDao->LogCheckReturnId($login, $password);
        
        $user = $userDao->GetUserById($userId);
        
        $_SESSION['userid'] = $userId;
        $_SESSION['name'] = $user['login'];
        $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
        
        return $userId;
    }
    
    public function ClearSession(){
        unset($_SESSION['userid']);
        unset($_SESSION['user_ip']);
    }
}