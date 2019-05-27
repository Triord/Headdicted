<?php
require_once ('db.php');

//RECUPERATION DE DATAS
//fonction permettant de récupérer la liste des utilisateurs
function getUsers() {
    $db = getDb();
    $response = $db->query('SELECT r.name, u.* FROM `user` AS u JOIN role AS r ON role_id = r.id; ');
    $datas = $response->fetchAll();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//fonction permettant de récupérer un utilisateurs sur base de son login
function getUser($login) {
    $db = getDb();
    //$response = $db->query('SELECT * FROM USER WHERE login = \''.$login.'\'');
    $response = $db->prepare('SELECT * FROM user WHERE login = :login');
    $response->execute(array('login' => $login));
    $datas = $response->fetch();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//fonction permettant de récupérer un utilisateurs sur base de son id
function getUserById($id) {
    $db = getDb();
    $response = $db->prepare('SELECT * FROM user WHERE id = :id');
    $response->execute(array('id' => $id));
    $datas = $response->fetch();
    $response->closeCursor(); // Termine le traitement de la requête
    return $datas;
}

//MODIFICATIONS DE DATAS
//fonction permettant de modifier un utilisateur sur base de son id grâce aux valeurs en params
function setUser($id, $values) {
    $query = 'UPDATE user SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE id = :id;';
    $db = getDb();
    $response = $db->prepare($query);
    $response->execute(array_merge(array('id' => $id), $values));
    $response->closeCursor(); // Termine le traitement de la requête
}

//fonction permettant de promouvoir ou retrograder un utilisateur sur base de son id grâce aux valeurs en params
function setRole($id, $role){
    $db = getDb();
    if($role == 2){
      $response = $db->prepare('UPDATE `user` SET `role_id` = 1 WHERE `user`.`id` = :id');
      $response->execute(array('id' => $id));
      $response->closeCursor();
    }
    else{
      $response = $db->prepare('UPDATE `user` SET `role_id` = 2 WHERE `user`.`id` = :id');
      $response->execute(array('id' => $id));
      $response->closeCursor();
    }
}

//AJOUTS DE DATAS
//fonction permettant d'ajouter un utilisateur
function newUser($values) {
    $query = 'INSERT INTO user SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1);
    $db = getDb();
    $response = $db->prepare($query);
    $response->execute($values);
    $response->closeCursor(); // Termine le traitement de la requête
}
?>
