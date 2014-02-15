<?php

function getTietokantayhteys() {
  static $yhteys = null;

  if ($yhteys === null) {
    require 'lib/settings.php';
    $yhteys = new PDO($dsn, $username, $password);
    $yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }

  return $yhteys;
}