<?php

require_once 'lib/lib.php';

checkLogged();

$loggedUser = loggedUser();

if (isset($_POST['action']) && $_POST['action']=='insert'){
   $yarnname = $_POST['yarnname'];
   $yarnmanu = (int) $_POST['yarnmanu'];
   $nsrmin = $_POST['nsrmin'];
   $nsrmax = $_POST['nsrmax'];
   $lpg = (int) $_POST['lpg'];
   $description = $_POST['description'];

   echo $yarnname.$yarnmanu.$nsrmin.$nsrmax.$lpg.$description;

/*   Yarn::addYarn($yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
   redirect('home.php');*/

} else {
   showView('views/addyarn.php', array('user' => $loggedUser->getUsername()), 'Lisää lanka');
}