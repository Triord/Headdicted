<?php
require_once ('models/item.php');
session_start();
if(empty($_SESSION['login']) or $_SESSION['role_id']!=1){
    header('Location: index');
    exit();
}
$stats = getStat();
$jsonfile = fopen('json/stat.json', 'w');
fwrite($jsonfile, json_encode($stats));
fclose($jsonfile);
include 'views/sales_chart.php';
?>
