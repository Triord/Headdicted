<?php
require_once ('models/item.php');
session_start();
if(empty($_SESSION) or $_SESSION['role_id']!= 1){
  header('Location: index');
  exit();
}

$infosEdit = getInfosById($_GET['id']);
include 'views/edit_info.php';
?>
