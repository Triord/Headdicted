<?php
require_once ('models/user.php');
session_start();
if(empty($_SESSION['login'])){
    header('Location: index');
    exit();
}
if(!empty($_POST['id']))
{
    if ($_POST['password'] === $_POST['passwordconfirm']){
        $login = $_POST['login'];
        if ($_POST['password']){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $values = array('login' => $login, 'password' => $password);
        } else {
            $values = array('login' => $login);
        }
        setUser($_POST['id'], $values);
        $user = getUserById($_POST['id']);
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['role_id'] = $user['role_id'];
        header('Location: index');
        exit();
    }
    else{
      $error = "Le mot de passe et la confirmation ne sont pas identiques";
      include "views/profile.php";
    }
}
?>
