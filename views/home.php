<?php
ob_start() ?>
&nbsp;

<div class="container" style="background-color: #343A40">
  <img class="d-block w-100" style="padding-right:3em;background-color: #343A40; " src="/img/headdicted.jpg" alt="Headdicted">&nbsp;

  <div class="row" >
  <?php foreach($items as $item):?>
    <div class="card border-secondary mb-3" style="text-align: center; width: 13.5rem; background-color: black;">
      <div class="card-body">
        <h6 class="card-title" style="text-align: center; color:white"  ><?=$item['title']?></h6>
      </div>
      <div style="text-align: center"><img style="width: 6rem; text-align: center" src="/img/Items/itemNb<?=$item['id']?>.jpg" alt="" ></div>&nbsp;
      <p class="card-text" style="text-align: center; color: white;"><?=$item['price']?>€</p>
      <form method="get" action="item_sheet">
        <p style="text-align: center">
            <input type="hidden" name="id" value=<?=$item['id']?>>
            <button type="submit" style="width: 95%;" class="btn btn-primary">Voir la fiche</button>
        </p>
      </form>
      <?php if(empty($_SESSION['login']) or $_SESSION['role_id']!=1):?>
      <form method="post" action="add_to_cart">
        <p style="text-align: center">
          <input type="hidden" name="id" value=<?=$item['id']?>>
          <input type="hidden" name="price" value=<?=$item['price']?>>
          <input type="submit" style="width: 95%;" value="Ajouter au panier" class="btn btn-success">
        </p>
      </form>
      <?php endif?>
    </div>
    &nbsp;
  <?php endforeach ?>
  </div>
</div>

<?php
$title = 'Accueil';
$content = ob_get_clean();
include 'includes/layout.php';
?>
