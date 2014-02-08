<?php

require_once 'lib/lib.php';

checkLogged();

$loggedUser = loggedUser();

if (!isset($_GET['yarn_id'])){
   header('Location: home.php');
   exit();
}

$yarn_id = (int)$_GET['yarn_id'];
$yarn = Yarn::getYarnById($yarn_id);
$manu = Manu::getManuById($yarn->getYarnmanu());

if (is_null($yarn)) {
   header('Location: home.php');
   exit();
}

showView('views/yarn.php', array
(
'user' => $loggedUser->getUsername(),
'yarn' => $yarn,
'manu' => $manu
));
