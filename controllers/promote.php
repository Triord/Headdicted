<?php
require_once ('models/user.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
if(!empty($_GET['id']) and !empty($_GET['role']))
{
    $error='';
    $res=setRole($_GET['id'], $_GET['role']);
    header('Location: users');
    exit();
}
?>
