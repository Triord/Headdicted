<?php
ob_start();
?>
<div class="container logbox" style="color: white">
    <form method="post" action="<?=$action?>">
        <?php if(isset($item)):?>
        <input type="hidden" name="id" value=<?=$item['id']?>>
        <?php endif?>
        <div class="form-group">
            <label for="gtitle">Titre</label>
            <input type="text" class="form-control" id="gtitle" name="gtitle" value=<?php if(isset($item)) { echo $item['title']; }?>>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control" id="price" name="price" value=<?php if(isset($item)) { echo $item['price']; }?>>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
<?php
$content = ob_get_clean();
$title = "Edition du jeu: ".$item['title'];
include 'includes/layout.php';
?>
