<?php
require_once ('models/item.php');
require_once ('models/cart.php');
session_start();
$items = getItems();
if(!empty($_SESSION['login']) and $_SESSION['role_id']!=1){
  $cartOrder = orderForCart($_SESSION['id']);
  if($cartOrder['id']!=NULL){
    $_SESSION['cartQt'] = cartQt($cartOrder['id']);
  }

}
require 'views/home.php';
?>
