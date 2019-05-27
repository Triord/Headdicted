<?php
ob_start();
?>
<table class="table table-hover table-striped" style="color: white">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Style</th>
            <th scope="col">Prix</th>
            <th style="text-align: right; color: white" scope="col">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jsonImport">Import via JSON</button>
              <?php include 'includes/import_json.php' ?>
              &nbsp;
              <a class="btn btn-success" href="add_item_form" role="button">Ajouter un produit</a>
            </th>
        </tr>
    </thead>
    <tbody>
      <?php foreach($items as $item):?>
      <tr>
          <th scope="row"><?=$item['id']?></th>
          <td><img style="width: 2rem; text-align: center;" src="/img/Items/itemNb<?=$item['id']?>.jpg" alt="" ></td>
          <td><?=$item['title']?></td>
          <td><?=$item['price']?>€</td>
          <td>
              <div class="row">
                  <form action="item">
                      <input type="hidden" name="id" value=<?=$item['id']?>>
                      <button class="btn btn-outline-success" type="submit">Editer</button>
                  </form>
                  &nbsp;
                  <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delitem<?= $item['id']?>">
                      Supprimer
                  </button>
                  <?php include 'includes/delete_item.php' ?>
                  &nbsp;
                  <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#addimg<?= $item['id']?>">
                      Ajouter/changer une image
                  </button>
                  <?php include 'includes/add_image.php' ?>

              </div>
          </td>

      </tr>
      <?php endforeach ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
$title = 'Gestion des couvre-chefs';
include 'includes/layout.php';
?>
