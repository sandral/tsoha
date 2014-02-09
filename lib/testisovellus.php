<?php

require 'lib/class_user.php';
require 'lib/tietokantayhteys.php';

$yhteys = getTietokantayhteys();
$sql = "SELECT user_id, username, password from users";
$kysely = getTietokantayhteys()->prepare($sql);
$kysely->execute();

$tulokset = array();
foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
$kayttaja = new User($tulos->user_id, $tulos->username, $tulos->password)
}
$olio = $kysely->fetchObject();
echo $olio->username;