<?php

    include_once '/DAO/OrderDAO.php';
    if (isset($_POST['name']) &  isset($_POST['email']) & isset($_POST['mobile'])) {
        $to = 'krechat@outlook.com';
        $subject = '=?UTF-8?B?' . base64_encode('Новый заказ') . '?=';
        $headers = 'From: inside.cerebro@gmail.com';
        $message = $_POST['name'] .'    ' . $_POST['email'] . '     ' . $_POST['mobile'];
        $name = $_POST['name'];
        $phone = $_POST['mobile'];
        $email = $_POST['email'];
        
        $result = OrderDao::AddOrder($name, $phone, $email);
        if (mail($to, $subject, $message, $headers)) {
            echo 'send';
        } else {
            echo 'failed';
        }
        
        return json_decode($result);
    }
          


