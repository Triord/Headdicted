<?php
ob_start();
?>
<table class="table table-hover table-striped" style="color: lightgrey">
    <thead>
        <tr>
            <th scope="col">Commande</th>
            <th scope="col">Client</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach($orders as $order):?>
      <tr>
          <th scope="row"><?=$order['id']?></th>
          <td><?=$order['login']?></td>
          <td><?=$order['status_id']?></td>
          <td>
              <div class="row">
                <form method="get" action="more_order">
                    <input type="hidden" name="id" value=<?=$order['id']?>>
                    <input type="hidden" name="login" value=<?=$order['login']?>>
                    <button type="submit" class="btn btn-warning">Détails</button>
                </form>
                &nbsp;
                <form method="get" action="change_status">
                    <input type="hidden" name="id" value=<?=$order['id']?>>
                    <input type="hidden" name="status" value=<?=$order['status_id']?>>
                    <?php
                    if($order['status_id']==3){
                      echo '<button class="btn btn-outline-success" type="submit">Validée</button>';
                    }
                    elseif($order['status_id']==1){
                      echo '<button class="btn btn-outline-warning" type="submit">En attente</button>';
                    }
                    else{
                      echo '<button class="btn btn-outline-primary" type="submit">Payée</button>';
                    }
                    ?>
                </form>
              </div>
          </td>

      </tr>
      <?php endforeach ?>
    </tbody>
</table>
<?php
$title = 'Gestion des commandes';
$content = ob_get_clean();
include 'includes/layout.php';
?>
