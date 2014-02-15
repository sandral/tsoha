<?php

require_once 'lib/lib.php';

checkLogged();

if (!isset($_GET['yarn_id'])) {
  redirect('user_list_owns.php');
}

$yarn_id = (int)$_GET['yarn_id'];

/*
if (!loggedUser()->owns($yarn_id)){
  redirect('user_list_owns.php');
}
*/

$yarn = Yarn::getYarnById($yarn_id);

if (is_null($yarn)) {
  redirect('user_list_owns.php');
}

$yarnmanu = $yarn->getYarnmanu() == null ? -1 : $yarn->getYarnmanu();

if (isset($_POST['filled'])) {

  $amount = $_POST['amount'];
  $error = false;

  if (is_numeric($amount) && $amount >= 0) {
    $amount = (int) $amount;
  } else {
    $error = true;
    showError('Määrän tulee olla positiivinen luku.');
  }

  if ($error) {
    showView('views/user_yarn.php', array(
      'action' => 'modify',
      'yarn_id' => $yarn_id,
      'yarnname' => $yarn->getYarnname(),
      'yarnmanu' => $yarnmanu,
      'nsrmin' => $yarn->getNsrmin(),
      'nsrmax' => $yarn->getNsrmax(),
      'lpg' => $yarn->getLpg(),
      'description' => $yarn->getDescription(),
      'amount' => loggedUser()->amount($yarn_id)
      ), 'Langan tiedot');

  }

  if ($_GET['action'] == 'modify') {
    loggedUser()->updateOwns($yarn_id, $amount);
    showMessage('Määrä päivitetty.');
    redirect('user_list_owns.php');
  }

}




showView('views/user_yarn.php', array(
    'action' => 'modify',
    'yarn_id' => $yarn_id,
    'yarnname' => $yarn->getYarnname(),
    'yarnmanu' => $yarnmanu,
    'nsrmin' => $yarn->getNsrmin(),
    'nsrmax' => $yarn->getNsrmax(),
    'lpg' => $yarn->getLpg(),
    'description' => $yarn->getDescription(),
    'amount' => loggedUser()->amount($yarn_id)
    ), 'Langan tiedot');


redirect('user_list_owns.php');