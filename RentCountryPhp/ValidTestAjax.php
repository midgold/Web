<?php
include 'components/Db.php';
include 'Controllers/Home.php';
include 'Controllers/Rent.php';
include 'Controllers/Manage.php';
include 'Controllers/Register.php';
include 'Controllers/Cart.php';
include 'Controllers/Profile.php';
include 'Helpers/Validation.php';
include 'Helpers/Autorization.php';
include 'DAO/CategoryDAO.php';
include 'DAO/OrderDAO.php';
include 'DAO/ProductDAO.php';
include 'DAO/UserDAO.php';
checklog();
function checklog() {
    $validation = new Validation();
    $access = array();
    $access = $validation->CheckAll($_POST['login'], $_POST['email'], $_POST['password']);
    $errors = $validation->GetErrors();
    if($errors['login'] & $errors['email'] & $errors['password'])
        $access['access'] = true;
    else
        $access['access'] = false;
    $error = json_encode($access);
    echo $error;
}
