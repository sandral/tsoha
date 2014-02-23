<?php

function getTietokantayhteys() {
  static $yhteys = null;

  if ($yhteys === null) {

    require 'lib/settings.php';

    if (isset($username)) {
      $yhteys = new PDO($dsn, $username, $password);
    } else {
      $yhteys = new PDO($dsn);
    }
    $yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }

  return $yhteys;
}