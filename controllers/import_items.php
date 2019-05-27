<?php
require_once ('models/item.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}

if(isset($_FILES['file'])){
  $file = $_FILES['file'];

  //propriétés du fichier
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_size = $file['size'];
  $error = $file['error'];

  //permissions
  $file_ext = explode('.',$file_name);
  $file_ext = strtolower(end($file_ext));

  $allowed = array('json');
  if(in_array($file_ext, $allowed)){
    if($error === 0){
      $file_destination = 'json/datasitem' . '.' . $file_ext;
      if(move_uploaded_file($file_tmp, $file_destination)){
        $json = file_get_contents("json/datasitem.json");
        $datas = json_decode($json);
        foreach ($datas as $data) {
          $gtitle = $data->title;
          $price = $data->price;
          $values = array('title' => $gtitle, 'price' => $price);
          $item = newItem($values);
        }
        header('Location: itemspan');
        exit();
      }
      else{
        $error = 'Erreur lors de l\'upload';
      }
    }
  }
  else{
    $error = 'Votre fichier doit être sous .json pour être importé';
  }
}
$items = getItems();
include 'views/itemspan.php';
?>
