<?php

require_once 'lib/lib.php';

checkLogged();

$loggedUser = loggedUser();

if (isset($_POST['yarn_id'])){
   $yarn_id = (int)$_POST['yarn_id'];
   $yarnname = $_POST['yarnname'];
   $yarnmanu = (int)$_POST['yarnmanu'];
   $nsrmin = $_POST['nsrmin'];
   $nsrmax = $_POST['nsrmax'];
   $lpg = $_POST['lpg'];
   $description = $_POST['description'];

   if ($_POST['action']=='update') {
      Yarn::updateYarn($yarn_id, $yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
      $yarn = Yarn::getYarnById($yarn_id);
      $manu = Manu::getManuById($yarn->getYarnmanu());
      showView('views/yarn.php', array('user' => $loggedUser->getUsername(), 'yarn' => $yarn, 'manu' => $manu, 'message' => 'Lanka päivitetty.'));
   }
} else {
   if (isset($_GET['yarn_id'])){
      $yarn_id = (int)$_GET['yarn_id'];

      $yarn = Yarn::getYarnById($yarn_id);

      if (is_null($yarn)) {
         header('Location: home.php');
         exit();
      }

      if ($_GET['delete']==1) {
         echo 'Oletko varma, että haluat poistaa langan?<br>';
	 echo '<a href="yarn.php?yarn_id='.$yarn->getId().'&delete=2"> Kyllä </a>';
	 echo '<a href="yarn.php?yarn_id='.$yarn->getId().'"> En </a>';
      } else if ($_GET['delete']==2) {
         echo 'Lanka leikisti poistettu!';
      } else {
         $manu = Manu::getManuById($yarn->getYarnmanu());
         showView('views/yarn.php', array('user' => $loggedUser->getUsername(), 'yarn' => $yarn, 'manu' => $manu));
      }

   } else {
      header('Location: home.php');
      exit();
   }
}