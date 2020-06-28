<?php
include 'DAO/AdminDAO.php';
$hash = $_GET['verify'];
if(AdminDAO::GetUserByHashEmail($hash)){
    echo 'Email подтвержден';
}
else{
    echo 'not work';
}

