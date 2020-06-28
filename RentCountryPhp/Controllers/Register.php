<?php

class Register {

    public $user;
    public $validation;
    public $autorize;

    public function __construct() {
        $this->user = new UserDAO();
        $this->validation = new Validation();
        $this->autorize = new Autorization();
    }

    public function Registration() {
        $user = new UserDAO();
        $validation = new Validation();
        $autorize = new Autorization();
        if (isset($_POST['submit'])) {
            $this->user->AddUser($_POST['login'], $_POST['password'], $_POST['email'], 0, date(DATE_RSS), date(DATE_RSS));
            $userId = $this->autorize->CheckLogInData($_POST['login'], $_POST['password']);
        }
        require_once('Views/Register/Registration.php');
    }

    public function LogIn() {
        if (isset($_POST['submit'])) {

            $userId = $this->autorize->CheckLogInData($_POST['login'], $_POST['password']);
            if ($userId) {
                header('Location: /index.php');
            } else {
                echo 'Неверные данные';
            }
        }

        require_once('Views/Register/LogIn.php');
    }

    public function LogOut() {
        $this->autorize->ClearSession();
        
        header('Location: /index.php');
    }

}
