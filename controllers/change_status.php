<?php
require_once ('models/order.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
if(!empty($_GET['id']) and !empty($_GET['status']))
{
    $error='';
    $res=setStatus($_GET['id'], $_GET['status']);
    header('Location: orders');
    exit();
}
?>
