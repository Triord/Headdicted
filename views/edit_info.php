<?php
ob_start();
?>
<div class="container logbox" style="color: white">
    <form method="post" action="apply_infos">
        <?php if(isset($infosEdit)):?>
        <input type="hidden" name="id" value=<?=$infosEdit['id']?>>
        <?php endif?>
        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque" value="<?php if(isset($infosEdit)) { echo $infosEdit['marque']; }?>">
        </div>
        <div class="form-group">
            <label for="style">Style</label>
            <input type="text" class="form-control" id="style" name="style" value="<?php if(isset($infosEdit)) { echo $infosEdit['style']; }?>">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
<?php
$content = ob_get_clean();
$title = 'Editer les informations';
include 'includes/layout.php';
?>
