<?php
require_once ('models/user.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
if(!empty($_GET['id']))
{
    $user = getUserById($_GET['id']);
    $action = "edit_user";
}
include 'views/user.php';
?>
