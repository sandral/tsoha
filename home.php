<?php

require_once 'lib/class_user.php';
require_once 'lib/lib.php';

if (logged()){
  $loggedUser = loggedUser();
  echo 1;
  showView('views/home.php', array
(
'user' => $loggedUser
)
);
  exit();
} else {
  header('Location: login.php');
  exit();
}