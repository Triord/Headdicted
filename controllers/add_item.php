<?php
require_once ('models/item.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
else{
  if(!empty($_POST['gtitle']) AND !empty($_POST['price']))
  {
    $gtitle = $_POST['gtitle'];
    $price = $_POST['price'];
    $values = array('title' => $gtitle, 'price' => $price);
    $item = newItem($values);
    header('Location: itemspan');
    exit();
  }
}


?>
