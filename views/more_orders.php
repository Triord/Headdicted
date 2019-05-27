<?php
$total = 0;
ob_start();?>
&nbsp;
<div class="container" style="color: lightgrey">
  <h2>Détails sur la commande n°<?=$idOrder?> concernant <?=$user['login']?></h2>
  &nbsp;
  <table class="table table-hover table-striped">
    <thead>
      <tr>
          <th scope="col">Image</th>
          <th scope="col">Style</th>
          <th scope="col" style ="text-align: right">Prix</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($items as $item):?>
        <tr>
            <td><img style="width: 2rem; text-align: center;" src="/img/Items/itemNb<?=$item['item_id']?>.jpg" alt="" ></td>
            <td><?=$item['title']?></td>
            <td style ="text-align: right"><?=$item['price']?>€</td>
        </tr>
        <?php $total = $total + $item['price'];?>
      <?php endforeach ?>
      </tbody>
  </table>
  <p class="font-weight-bold" style ="text-align: right;color: red">TOTAL&nbsp;&nbsp;</p>
  <p style ="text-align: right;color: red"><?=$total?>€&nbsp;&nbsp;</p>
</div>
<?php
$content = ob_get_clean();
$title = 'Détails sur la commande';
include 'includes/layout.php';
?>
