<?php
session_start();
require_once ('models/order.php');
require_once ('models/cart.php');
require_once ('models/user.php');
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
else{
  $idOrder = $_GET['id'];
  $user = getUser($_GET['login']);
  $items = cartByOrderId($_GET['id']);
  include 'views/more_orders.php';
}
?>
