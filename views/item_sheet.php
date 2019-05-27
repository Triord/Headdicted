
<?php
//TAMPON 1 : INFOS
ob_start();
?>
<div class="font-weight-bold lead">Marque: </div>
<p class="lead"><?=$infos['marque'];?></p>

<div class="font-weight-bold lead">Style: </div>
<p class="lead"><?=$infos['style'];?></p>
<?php
$info = ob_get_clean();


//TAMPON 2 : BOUTON EDITION
ob_start();
?>
<form style="text-align: right;" method="get" action="edit_info">
  <input type="hidden" name="id" value="<?= $item['id']?>">
  <input type="submit" name="update" class="btn btn-primary" value="Editer les informations">
</form>
<?php
$formEdit=ob_get_clean();

//TAMPON 3 : BOUTON REFRESH
ob_start();
?>
&nbsp;
<form style="text-align: right;" method="get" action="item_sheet">
  <input type="hidden" name="id" value="<?= $item['id']?>">
  <input type="submit" name="update" class="btn btn-success" value="Actualiser">
</form>
<?php
$refresh=ob_get_clean();

//TAMPON 1 : INFOS
ob_start();
?>
<div class="container" style="background-color: #343A40">
  <div class="card" style="background-color: #343A40">
    <div class="card-header" >
      <img src="/img/Items/itemNb<?=$_GET['id']?>.jpg" style="width: 16rem "  class="rounded float-left" alt="...">
    </div>
    <div class="card-body" style="color: lightgrey">
      <h4 class="card-title" style="color: white"><?=$item['title']?></h4>
      <hr>
      <?php
      if(isset($infos)){
        echo $info;
      }
      if(!empty($_SESSION['login']) and $_SESSION['role_id']==1){
        echo $formEdit;
      }
      if(isset($flag)){
        echo $refresh;
      }
      ?>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Fiche: ' . $item['title'];
include 'includes/layout.php';
?>
