<?php

class Profile {

    public function Info($id) {
        $userDAO = new UserDAO();
        $user = $userDAO->GetUserById($id);

        require_once('Views/Profile/Info.php');
    }

    public function Edit($id) {
        $userDAO = new UserDAO();
        $user = $userDAO->GetUserById($id);
        if (isset($_POST['submit'])) {           
            if ($_POST['password']) {
                $dfsa = $_POST['password'];
                $password_hash = md5($_POST['password']);
                $userDAO->UpdateUser($id, $_POST['login'], $password_hash,$_POST['email']);
            }else{
                $userDAO->UpdateUser($id, $_POST['login'], $user['password_hash'],$_POST['email']);
            }
        }
        require_once('Views/Profile/Edit.php');
    }

}
