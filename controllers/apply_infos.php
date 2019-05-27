<?php
require_once ('models/item.php');
session_start();
if(empty($_SESSION) or $_SESSION['role_id']!= 1){
  header('Location: index');
  exit();
}

$style = $_POST['style'];
$marque = $_POST['marque'];
$values = array('type' => $type, 'marque' => $marque);
$result = setInfos($_POST['id'], $values);
header('Location: index');
exit();
?>
