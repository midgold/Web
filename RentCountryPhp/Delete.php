<?php
include '/DAO/OrderDAO.php';
OrderDao::DeleteById($_POST['id']);
