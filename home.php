<?php

require_once 'lib/lib.php';
require_once 'lib/classes.php';

echo 1;
echo var_export($_SESSION);
echo 2;
if (logged()){
  $loggedUser = loggedUser();

  $owns = $loggedUser->getOwned();

  showView('views/home.php', array('user' => $loggedUser->getUsername(), 'owns' => $owns));

} else {
  header('Location: login.php');
  exit();
}