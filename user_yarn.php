<?php

require_once 'lib/lib.php';

checkLogged();

if ($_GET['action'] == 'insert') {
  if (!isset($_POST['filled'])) {
    showView('user_yarn_add.php', array('action' => 'insert'), 'Langan lisäys');
  } else {
  $error = false;

  $yarn_id = $_POST['yarn'];
  $amount = $_POST['amount'];

  if (is_numeric($amount) && $amount >= 0) {
      $amount = (int) $amount;
    } else {
      $error = true;
      showError('Määrän tulee olla positiivinen luku.');
    }
  }

  if ($error) {
    showView('user_yarn_add.php', array('action' => 'insert', 'yarn_id' => $yarn_id), 'Langan lisäys');
  } else {

    loggedUser()->insertOwns($yarn_id, $amount);
    redirect('user_list_owns.php');

  }
} else if ($_GET['action'] == 'modify' && isset($_GET['yarn_id'])) {
  
  $yarn_id = (int)$_GET['yarn_id'];
  
  $yarn = Yarn::getYarnById($yarn_id);
  $yarnmanu = $yarn->getYarnmanu() == null ? -1 : $yarn->getYarnmanu();

  if (is_null($yarn)) {
    redirect('user_list_owns.php');
  }  
  
  if (isset($_POST['filled'])) {
  
    $error = false;
    $amount = $_POST['amount'];
  
    if (is_numeric($amount) && $amount >= 0) {
      $amount = (int) $amount;
    } else {
      $error = true;
      showError('Määrän tulee olla positiivinen luku.');
    }
  
    if ($error) {
      if (loggedUser()->owns($yarn_id)) {
        $amount = loggedUser()->amount($yarn_id);
      } else {
        $amount = -1;
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
        'amount' => $amount,
        'attrs' => $yarn->listAttributes()
        ), 'Langan tiedot');
    }

    if (loggedUser()->owns($yarn_id)) {
      loggedUser()->updateOwns($yarn_id, $amount);
      showMessage('Määrä päivitetty.');
    } else {
      loggedUser()->insertOwns($yarn_id, $amount);
      showMessage('Lanka lisätty kokoelmaan.');
    }
    redirect('user_list_owns.php');
  } else {

    if (loggedUser()->owns($yarn_id)) {
      $amount = loggedUser()->amount($yarn_id);
    } else {
      $amount = -1;
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
      'amount' => $amount,
      'attrs' => $yarn->listAttributes()
      ), 'Langan tiedot');
  }
} else if ($_GET['action'] == 'delete' && isset($_GET['yarn_id'])) {
  $yarn_id = (int)$_GET['yarn_id'];

  showView('views/question.php',
                  array('question' => 'Oletko varma, että haluat poistaa langan kokoelmastasi?',
                        'choices' => array(array('Kyllä', 'user_yarn.php?action=deleteconfirm&yarn_id='.$yarn_id),
                                           array('En', 'user_list_owns.php')
                                          )
                       ), 'Langan poisto');

} else if ($_GET['action'] == 'deleteconfirm' && isset($_GET['yarn_id'])) {
  $yarn_id = (int)$_GET['yarn_id'];

  loggedUser()->deleteOwns($yarn_id);

  showMessage('Lanka poistettu kokoelmastasi.');
  redirect('user_list_owns.php');
} else {
  redirect('user_yarn.php?action=insert');
}


redirect('user_list_owns.php');