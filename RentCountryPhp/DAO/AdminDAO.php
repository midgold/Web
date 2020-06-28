<?php
class AdminDAO {

    public static function UpdateAdminPassword($password) {
        if ($password >= 6) {
            $db = Db::getConnection();

            $sql = 'update admin set password = :password where id = 1';

            $result = $db->prepare($sql);

            $result->bindParam(':password', $password, PDO::PARAM_STR);

            return $result->execute();
        } else {
            echo 'password can`t be less 6 chapters';
        }
    }

    public static function GetAdmin() {
        $db = Db::getConnection();

        $sql = 'select * from admin';

        $result = $db->prepare($sql);
        $result->execute();
        
        return $result->fetch();
    }
    public static function AddAdmin($login, $password, $email){
        $db = Db::getConnection();
        $hashemail = md5($email);
        $hashpassword = md5($password.'somestring');
        $status = 0;
        $sql = 'insert into admin(login, password, email, hashemail, status) values(:login, :password, :email, :hashemail, :status)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $hashpassword, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':hashemail', $hashemail, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        
        $to = $email;
        $subject = '=?UTF-8?B?' . base64_encode('Проверка email') . '?=';
        $headers = 'From: inside.cerebro@gmail.com';
        $message = 'http://localhost:81/FirstLanding/Verify.php?verify='.$hashemail;
        mail($to, $subject, $message, $headers);
        return $result->execute();

    }
    public static function GetUserByHashEmail($hash) {
        $db = Db::getConnection();

        $sql = "select * from admin where hashemail = '".$hash."'";

        $result = $db->prepare($sql);
        $result->execute();
        
        return $result->fetch();
    }
    
    public static function ChangeStatus(){
        
    }
}
