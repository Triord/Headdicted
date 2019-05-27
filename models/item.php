<?php
require_once ('db.php');

//RECUPERATION DE DATAS
//fonction permettant de récupérer la liste des jeux
function getItems() {
    $db = getDb();
    $response = $db->query('SELECT * FROM item');
    $datas = $response->fetchAll();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//fonction permettant de récupérer un jeu sur base de son titre
function getItem($gtitle) {
    $db = getDb();
    $response = $db->prepare('SELECT * FROM item WHERE title = :gtitle');
    $response->execute(array('title' => $gtitle));
    $datas = $response->fetch();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//fonction permettant de récupérer les stats de ventes
function getStat() {
    $db = getDb();
    $response = $db->query('SELECT COUNT(b.id) AS qt, i.title FROM book_item AS b JOIN item AS i ON b.item_id = i.id GROUP BY item_id ORDER BY qt DESC LIMIT 5');
    //la requête renvoie les 5 jeux les plus vendus
    $datas = $response->fetchAll();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//fonction permettant de récupérer un jeu sur base de son id
function getItemById($id) {
    $db = getDb();
    $response = $db->prepare('SELECT * FROM item WHERE id = :id');
    $response->execute(array('id' => $id));
    $datas = $response->fetch();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//fonction permettant de récupérer les infos d'un jeu sur base de son id
function getInfosById($item_id) {
    $db = getDb();
    $response = $db->prepare('SELECT * FROM info_item WHERE item_id = :item_id');
    $response->execute(array('item_id' => $item_id));
    $datas = $response->fetch();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//MODIFICATIONS DE DATAS
//fonction permettant de modifier un jeu sur base de son id graçe aux valeurs en params
function setItem($id, $values) {
    $query = 'UPDATE item SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE id = :id;';
    $db = getDb();
    $response = $db->prepare($query);
    $response->execute(array_merge(array('id' => $id), $values));
    $response->closeCursor(); // Termine le traitement de la requête
}

//fonction permettant de modifier les infos d'un jeu sur base de son id grâce aux valeurs en params
function setInfos($id, $values) {
    $query = 'UPDATE info_item SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE id = :id;';
    $db = getDb();
    $response = $db->prepare($query);
    $response->execute(array_merge(array('id' => $id), $values));
    $response->closeCursor(); // Termine le traitement de la requête
}

//SUPPRESSION DE DATAS
//fonction permettant la suppression d'un jeu sur base de son id
function deleteItem($id) {
    $db = getDb();
    $response = $db->prepare('DELETE FROM item WHERE id = :id;');
    $response->execute(array('id' => $id));
    $response->closeCursor(); // Termine le traitement de la requête
}

//fonction permettant la suppression des infos d'un jeu sur base de son id
function deleteInfo($id) {
    $db = getDb();
    $response = $db->prepare('DELETE FROM info_item WHERE id = :id;');
    $response->execute(array('id' => $id));
    $response->closeCursor(); // Termine le traitement de la requête
}

//AJOUT DE DATAS
//fonction permettant l'ajout d'un jeu grâce aux valeurs en params
function newItem($values) {
    $query = 'INSERT INTO item SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1);
    $db = getDb();
    $response = $db->prepare($query);
    $response->execute($values);
    $response->closeCursor(); // Termine le traitement de la requête
}

//fonction permettant l'ajout des infos d'un jeu grâce aux valeurs en params
function newInfos($values) {
    $query = 'INSERT INTO info_item SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1);
    $db = getDb();
    $response = $db->prepare($query);
    $response->execute($values);
    $response->closeCursor();
}
?>
