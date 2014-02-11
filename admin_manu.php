<?php

require_once 'lib/lib.php';

checkAdmin();

if ($_GET['action'] == 'insert') {
  $title = 'Lisää valmistaja';
} else {
  $title = 'Muokkaa valmistajaa';
}

if (isset($_POST['filled'])) {

  $manuname = trim($_POST['manuname']);
  $errorhappened = false;

  if ($manuname == '') {
     showError('Valmistajan nimi ei voi olla tyhjä.');
    $errorhappened = true;
  }

  if ($errorhappened) {
    showView('views/admin_manu.php', array(
      'action' => $_GET['action'],
      'manuname' => $manuname),
      $title
      );
  }

  if ($_GET['action'] == 'insert') {

    Manu::addManu($manuname);
    showMessage('Valmistaja lisätty.');

  } else if ($_GET['action'] == 'modify') {

    $manu_id = (int)$_POST['manu_id'];
    Manu::updateManu($manu_id, $manuname);
    showMessage('Valmistaja päivitetty.');
  }

  redirect('admin_list_manus.php');
}

if ($_GET['action'] == 'modify' && isset($_GET['manu_id'])){

  $manu_id = (int)$_GET['manu_id'];
  $manu = Manu::getManuById($manu_id);

  if (is_null($manu)) {
    redirect('admin_list_manus.php');
  }

  showView('views/admin_manu.php', array(
    'action' => 'modify',
    'manu_id' => $manu_id,
    'manuname' => $manu->getManuname()
    ), $title);

} else if ($_GET['action'] == 'insert') {
  showView('views/admin_manu.php', array('action'=>'insert'), $title);
} else if ($_GET['action'] == 'delete' && isset($_GET['manu_id'])) {
  $manu_id = (int)$_GET['manu_id'];
  $manu = Manu::getManuById($manu_id);

  showView('views/question.php',
                  array('question' => 'Oletko varma, että haluat poistaa valmistajan?',
                        'choices' => array(array('Kyllä', 'admin_manu.php?action=deleteconfirm&manu_id='.$manu->getId()),
                                           array('En', 'admin_list_manus.php')
                                          )
                       ), 'Valmistajan poisto');

} else if ($_GET['action'] == 'deleteconfirm' && isset($_GET['manu_id'])) {
  $manu_id = (int)$_GET['manu_id'];
  $manu = Manu::getManuById($manu_id);

  Manu::deleteManu($manu->getId());
  showMessage('Valmistaja poistettu.');
  redirect('admin_list_manus.php');
}

redirect('admin_manu.php?action=insert');