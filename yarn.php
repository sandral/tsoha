<?php

require_once 'lib/lib.php';
require_once 'lib/classes.php';

checkLogged();

$loggedUser = loggedUser();

if (!isset($_GET['yarn_id'])){
   header('Location: home.php');
   exit();
}

$yarn_id = $_GET['yarn_id'];
$yarn = Yarn::getYarnById($yarn_id);

if ($yarn == NULL) {
   header('Location: home.php');
   exit();
}

showView('views/yarn.php', array
(
'user' => $loggedUser->getUsername(),
'yarn' => $yarn
));
