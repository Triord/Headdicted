<?php
require_once ('db.php');

//fonction qui récupère l'id si une commande en attente existe avec l'id du user envoyé en params
function orderForCart($id){
    $db = getDb();
    $query="SELECT id FROM book WHERE status_id = 1 AND user_id = :id";
    $response = $db->prepare($query);
    $response->execute(array('id' => $id));
    $datas = $response->fetch();
    $response->closeCursor();
    return $datas;
}

//fonction qui récupère le panier en fonction de l'id de la commande
function cartByOrderId($cartOrder){
      $db = getDb();
      $query = "SELECT b.*, i.title FROM book_item AS b JOIN item AS i ON b.item_id = i.id WHERE b.book_id = :cartOrder";
      $response = $db->prepare($query);
      $response->execute(array('cartOrder' => $cartOrder));
      $datas = $response->fetchAll();
      $response->closeCursor(); // Termine le traitement de la requête
      return $datas;
  }

  //fonction pour ajouter un objet au panier
  function addToCart($values) {
      $query = 'INSERT INTO book_item SET';
      foreach ($values as $name => $value) {
          $query = $query.' '.$name.' = :'.$name.',';
      }
      $query = substr($query, 0, -1);
      $db = getDb();
      $response = $db->prepare($query);
      $response->execute($values);
      $response->closeCursor(); // Termine le traitement de la requête
  }

//fonction pour récupérer le nombre d'objet dans le panier
function cartQt($id){
      $db = getDb();
      $stmt = $db->prepare("SELECT COUNT(*) FROM book_item where book_id= :id");
      $stmt->execute(array('id' => $id));
      $count = $stmt->fetchColumn();
      return $count;
  }

//fonction supprimant un objet du panier sur base de l'id de l'objet
function removeFromId($id){
      $db = getDb();
      $response = $db->prepare('DELETE FROM book_item WHERE id = :id;');
      $response->execute(array('id' => $id));
      $response->closeCursor(); // Termine le traitement de la requête
}
?>
