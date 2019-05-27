<?php
function getDB() {
try
{
    $db = new PDO('mysql:host=localhost;dbname=headdicted;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
return $db;
}
?>
