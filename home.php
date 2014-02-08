<?php

require_once 'lib/lib.php';
require_once 'lib/classes.php';

if (logged()){
  $loggedUser = loggedUser();

  $owns = $loggedUser->getOwned();

  showView('views/home.php', array
(
'user' => $loggedUser->getUsername(),
'owns' => $owns
));


} else {
  header('Location: login.php');
  exit();
}