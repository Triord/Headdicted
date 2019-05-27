<?php
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
else{
    include 'views/add_item.php';
}

?>
