<?php

require_once 'lib/lib.php';

if (logged()){
  redirect('home.php');
}

if (empty($_POST['user']) && empty($_POST['pwd'])) {
   showView("views/login.php", array(), 'Kirjaudu sisään');
}

$user = $_POST['user'];
$pwd = $_POST['pwd'];

$objUser = User::getUserByUsername($user, $pwd);

if (!is_null($objUser)) {
   login($objUser);
   redirect('home.php');
} else {
   showView("views/login.php", array(
      'user' => $user,
      'error' => 'Väärä salasana ja/tai käyttäjätunnus.'),
      'Kirjaudu sisään');
}