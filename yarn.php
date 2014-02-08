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
echo 1;
if (is_null($yarn)) {
   header('Location: home.php');
   exit();
}
echo 2;
$manu = Manu::getManuById($yarn->getYarnmanu());
echo 3;
showView('views/yarn.php', array
(
'user' => $loggedUser->getUsername(),
'yarn' => $yarn,
'manu' => $manu
));
