<?php
require_once ('models/item.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
if(!empty($_GET['id']))
{
    $item = getItemById($_GET['id']);
    $action = "edit_item";
}
include 'views/edit_item.php';
?>
