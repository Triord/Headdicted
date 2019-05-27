<?php ob_start() ?>
  <div class="container" style="height:550px">
    <br>
    <h1 class="display-4">Erreur 404</h1>
    <p class="lead">Désolé, la page <b><?=$uri?></b> n'existe pas...</p>
  </div>

<?php
$title = 'Erreur 404';
$content = ob_get_clean();
include 'includes/layout.php';
?>
