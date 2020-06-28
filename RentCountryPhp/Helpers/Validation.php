<?php

class Validation{

    public $userDAO;
    public $errors;
    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function ValidLogin($login) {
        $result = $this->userDAO->CheckLogin($login);
        if(!$result){
            $this->errors['login'] = false;
            return 'This name already in use';
        }else {
            $this->errors['login'] = true;
            return 'имя свободно';    
        }
    }
    
    public function ValidPassword($password) {
        if(strlen($password) < 6){
            $this->errors['password'] = false;
            return 'Пароль не должен быть короче 6 символов';
        }else{
            $this->errors['password'] = true;
            return 'Корректно';
        }
    }
    
    public function ValidEmail($email) {
        $result = $this->userDAO->CheckEmail($email);
        if(!$result){
            $this->errors['email'] = false;
            return 'This email in use';
        }else {
            $this->errors['email'] = true;
            return 'почта свободна';    
        }
    }
    
    public function CheckAll($login, $email, $password) {
        $report = array();
        $report['login'] = $this->ValidLogin($login);
        $report['email'] = $this->ValidEmail($email);
        $report['password'] = $this->ValidPassword($password);
        
        return $report;
    }


    public function GetErrors(){
        return $this->errors;
//        if($this->errors['login'] & $this->errors['email'] & $this->errors['password']){
//            return true;
//        } else {
//            return false;
//        }
    }
}
