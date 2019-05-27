<?php
require_once ('models/user.php');
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}
include 'views/profile.php';
?>
