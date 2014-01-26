<?php

require 'lib/class_user.php';
require 'lib/tietokantayhteys.php';

$yhteys = getTietokantayhteys();
$sql = "SELECT user_id, username, password from users";
$kysely = getTietokantayhteys()->prepare($sql);
$kysely->execute();

$olio = $kysely->fetchObject();
echo $olio->username;