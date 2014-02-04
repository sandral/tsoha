<?php

require_once 'lib/class_user.php';
require_once 'lib/lib.php';

if (logged()){
  showView("views/home.php", array(
'user' => loggedUser()
));
} else {
  header('Location: login.php');
  exit();
}