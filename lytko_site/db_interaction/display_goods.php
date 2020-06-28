<?php
require_once '../config/db.php';

$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
$link->set_charset('utf8');

if(!empty($_GET['brick_type']) && $_GET['brick_type'] != 'null' && $_GET['brick_type'] != null)
{
  $sql_brick_popup = "select * from goods where type ='" . $_GET['brick_type'] . "'";
  $sql_brick_popup_query = mysqli_query($link, $sql_brick_popup) or die("Ошибка " . mysqli_error($link));
  while ($row = $sql_brick_popup_query->fetch_array()) {
    $brick_popup[] = $row[0];
  }
  echo $brick_popup[0];
}
 ?>
