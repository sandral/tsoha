<?php

require_once 'lib/lib.php';

checkLogged();

$loggedUser = loggedUser();

if (isset($_POST['filled'])) {
  $yarnname = $_POST['yarnname'];
  $yarnmanu = (int) $_POST['yarnmanu'];
  $nsrmin = $_POST['nsrmin'];
  $nsrmax = $_POST['nsrmax'];
  $lpg = (int) $_POST['lpg'];
  $description = $_POST['description'];

  if ($_GET['action'] == 'insert') {
    Yarn::addYarn($yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
    $_SESSION['message'] = 'Lanka lisätty.';
  } else if ($_GET['action'] == 'modify') {
    $yarn_id = (int)$_POST['yarn_id'];
    Yarn::updateYarn($yarn_id, $yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
    $_SESSION['message'] = 'Lanka päivitetty.';
  }

  redirect('home.php');
}

if ($_GET['action'] == 'modify' && isset($_GET['yarn_id'])){
  $yarn_id = (int)$_GET['yarn_id'];
  $yarn = Yarn::getYarnById($yarn_id);

  if (is_null($yarn)) {
    redirect('home.php');
  }

  $manu = Manu::getManuById($yarn->getYarnmanu());
  showView('views/yarn.php', array('action' => 'modify', 'yarn' => $yarn, 'manu' => $manu), 'Langan tiedot');
} else if ($_GET['action'] == 'insert') {
  showView('views/yarn.php', array('action'=>'insert'), 'Lisää lanka');
} else if ($_GET['action'] == 'delete' && isset($_GET['yarn_id'])) {
  $yarn_id = (int)$_GET['yarn_id'];
  $yarn = Yarn::getYarnById($yarn_id);

  showView('views/question.php',
                  array('question' => 'Oletko varma, että haluat poistaa langan?',
                        'choices' => array(array('Kyllä', 'yarn.php?action=deleteconfirm&yarn_id='.$yarn->getId()),
                                           array('En', 'home.php')
                                          )
                       ), 'Langan poisto');

} else if ($_GET['action'] == 'deleteconfirm' && isset($_GET['yarn_id'])) {
  $yarn_id = (int)$_GET['yarn_id'];
  $yarn = Yarn::getYarnById($yarn_id);

  Yarn::deleteYarn($yarn->getId());
  $_SESSION['message'] = 'Lanka poistettu.';
  redirect('home.php');
}

redirect('yarn.php?action=insert');