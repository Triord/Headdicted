<?php
ob_start();
?>
</br></br>
  <div class="container" style="color: lightgrey">
  <h1 class="display-4">AH! Visiblement vous n'aviez pas de panier!</h1>
    <hr class="my-4">
  <p class="lead">Pas de problème, un nouveau vient d'être créé, vous pouvez désormais retourner à l'accueil et ajouter vos objets au panier.</p>
  <a class="btn btn-primary btn-lg" href="index" role="button">Accueil</a>
  </div>

<?php
$title = 'Nouveau panier';
$content= ob_get_clean();

include 'includes/layout.php';
?>
