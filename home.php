<?php

require_once 'lib/class_owns.php';
require_once 'lib/class_user.php';
require_once 'lib/lib.php';

if (logged()){
  $loggedUser = loggedUser();

  showView('views/home.php', array
(
'user' => $loggedUser->getUsername(),
'owns' => $loggedUser->getOwned()
));


} else {
  header('Location: login.php');
  exit();
}