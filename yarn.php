<?php

require_once 'lib/lib.php';

checkLogged();

$loggedUser = loggedUser();

if (isset($_POST['yarn_id'])){
   $yarn_id = (int)$_POST['yarn_id'];




} else {
   if (isset($_GET['yarn_id'])){
      $yarn_id = (int)$_GET['yarn_id'];

      $yarn = Yarn::getYarnById($yarn_id);

      if (is_null($yarn)) {
         header('Location: home.php');
         exit();
      }

      $manu = Manu::getManuById($yarn->getYarnmanu());
      showView('views/yarn.php', array('user' => $loggedUser->getUsername(), 'yarn' => $yarn, 'manu' => $manu));

   } else {
      header('Location: home.php');
      exit();
   }
}