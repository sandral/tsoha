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










if ($_GET['action'] == 'insert') {
  $title = 'Lisää lanka';
} else {
  $title = 'Muokkaa lankaa';
}

if (isset($_POST['filled'])) {

  $yarnname = trim($_POST['yarnname']);
  $yarnmanu = $_POST['yarnmanu'];
  $nsrmin = $_POST['nsrmin'];
  $nsrmax = $_POST['nsrmax'];
  $lpg = $_POST['lpg'];
  $description = trim($_POST['description']);

  $errorhappened = false;

  if ($yarnname == '') {
     showError('Langan nimi ei voi olla tyhjä.');
    $errorhappened = true;
  }

  if ($nsrmin > $nsrmax) {
    showError('Tarkista puikkosuositukset.');
    $errorhappened = true;
  }

  if ($lpg != '' && (!is_numeric($lpg) || $lpg != (int) $lpg)) {
    showError('Pituuden tulee olla kokonaisluku.');
    $errorhappened = true;
  }

  if ($errorhappened) {
    showView('views/admin_yarn.php', array(
      'action' => $_GET['action'],
      'yarnname' => $yarnname,
      'yarnmanu' => $yarnmanu,
      'nsrmin' => $nsrmin,
      'nsrmax' => $nsrmax,
      'lpg' => $lpg,
      'description' => $description),
      $title
      );
  }

  if ($yarnmanu == -1) { $yarnmanu = NULL; } else { $yarnmanu = (int) $yarnmanu; }
  if (trim($lpg) == '') { $lpg = NULL; } else { $lpg = (int) $lpg; }

  if ($_GET['action'] == 'insert') {

    Yarn::addYarn($yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
    showMessage('Lanka lisätty.');

  } else if ($_GET['action'] == 'modify') {

    $yarn_id = (int)$_POST['yarn_id'];
    Yarn::updateYarn($yarn_id, $yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
    showMessage('Lanka päivitetty.');
  }

  redirect('admin_list_yarns.php');
}

if ($_GET['action'] == 'modify' && isset($_GET['yarn_id'])){

  $yarn_id = (int)$_GET['yarn_id'];
  $yarn = Yarn::getYarnById($yarn_id);

  if (is_null($yarn)) {
    redirect('admin_list_yarns.php');
  }

  $yarnmanu = $yarn->getYarnmanu() == null ? -1 : $yarn->getYarnmanu();

  showView('views/admin_yarn.php', array(
    'action' => 'modify',
    'yarn_id' => $yarn_id,
    'yarnname' => $yarn->getYarnname(),
    'yarnmanu' => $yarnmanu,
    'nsrmin' => $yarn->getNsrmin(),
    'nsrmax' => $yarn->getNsrmax(),
    'lpg' => $yarn->getLpg(),
    'description' => $yarn->getDescription()
    ), $title);

} else if ($_GET['action'] == 'insert') {
  showView('views/admin_yarn.php', array('action'=>'insert'), $title);
} else if ($_GET['action'] == 'delete' && isset($_GET['yarn_id'])) {
  $yarn_id = (int)$_GET['yarn_id'];
  $yarn = Yarn::getYarnById($yarn_id);

  showView('views/question.php',
                  array('question' => 'Oletko varma, että haluat poistaa langan?',
                        'choices' => array(array('Kyllä', 'admin_yarn.php?action=deleteconfirm&yarn_id='.$yarn->getId()),
                                           array('En', 'admin_list_yarns.php')
                                          )
                       ), 'Langan poisto');

} else if ($_GET['action'] == 'deleteconfirm' && isset($_GET['yarn_id'])) {
  $yarn_id = (int)$_GET['yarn_id'];
  $yarn = Yarn::getYarnById($yarn_id);

  Yarn::deleteYarn($yarn->getId());
  showMessage('Lanka poistettu.');
  redirect('admin_list_yarns.php');
}

redirect('user_list_owns.php');