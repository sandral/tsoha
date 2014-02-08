<?php

require_once 'lib/lib.php';
require_once 'lib/classes.php';

if (empty($_POST['user']) && empty($_POST['pwd'])) {
   showView("views/login.php");
   exit();
}

$user = $_POST['user'];
$pwd = $_POST['pwd'];

$objUser = User::getUserByUsername($user, $pwd);

if (!is_null($objUser)) {
   login($objUser);
   header('Location: home.php');
   exit();
} else {
   showView("views/login.php", array
(
'user' => $user,
'error' => 'Väärä salasana ja/tai käyttäjätunnus.'
));
exit();
}