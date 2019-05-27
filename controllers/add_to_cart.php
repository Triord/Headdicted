<?php
require_once ('models/order.php');
require_once ('models/cart.php');
session_start();
if(empty($_SESSION['login'])){
  header('Location: login');
}
elseif($_SESSION['role_id']==1){
    $error = 'Un admin ne peut pas passer de commande';
    header('Location: index');
    exit();
}
else{
    $res = checkIfOrder($_SESSION['id']);
    if(!$res){
      //ça rentre dans la condition si checkIfOrder n'a pas trouvé de commande en attente
      //(status_id = 2) dans book au nom de la personne loguée
      $values = array('user_id' => $_SESSION['id'], 'status_id' => 1);
      $order = newOrder($values);
      //la ligne ci-dessous redirige vers un message d'alerte pour l'utilisateur
      //car l'appel deux fois de suite à checkIfOrder buguait, j'ai du les séparrer
      //et donc renouveler l'operation
      header('Location: new_cart');
    }
    else{
      $res2 = checkIfOrder($_SESSION['id']);
      $book_id = $res2['id'];
      $values = array('book_id' => $res['id'], 'item_id' => $_POST['id'], 'price' => $_POST['price']);
      $itemToCart = addToCart($values);
      header('Location: index');
      exit();
    }






}
