<?php
session_start();
require_once ('models/order.php');
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
else{
  $orders = getOrders();
  include 'views/orders.php';
}
?>
