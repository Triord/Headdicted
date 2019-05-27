<?php
require_once ('models/item.php');
session_start();
if(!empty($_GET['id']))
{
    $item = getItemById($_GET['id']);
    $infos = getInfosById($_GET['id']);
    if(!$infos){
      $ed = 'rédaction en cours';
      $style = 'rédaction en cours';
      $values = array('style' => $style, 'marque' => $ed, 'item_id' => $item['id']);
      $res = newInfos($values);
      $flag = true;
    }
    include 'views/item_sheet.php';
}
?>
