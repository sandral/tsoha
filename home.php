<?php

require_once 'lib/class_user.php';
require_once 'lib/lib.php';

if (logged()){
  $loggedUser = loggedUser();
  echo $loggedUser;
} else {
  header('Location: login.php');
  exit();
}