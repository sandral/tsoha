<?php

require_once 'lib/showview.php';

if (empty($_POST['user']) || empty($_POST['pwd'])) {
   showView("views/login.php");
   exit();
}

$user = $_POST['user'];
$pwd = $_POST['pwd'];

if ($user == "sandra" && $pwd == "kakka") {
   header('Location: etusivu.php');
   exit();
} else {
   showView("views/login.php", array
(
'user' => $user,
'error' => 'Väärä salasana ja/tai käyttäjätunnus.'
));
   
     
 exit();
}