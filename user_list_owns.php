<?php

require_once 'lib/lib.php';

checkLogged();

$user = loggedUser();
$list = array();

foreach ($user->getOwned() as $e) {

  $a = array();
  $a['amount'] = $e['amount'];
  $a['yarnname'] = $e['yarn']->getYarnname();
  $a['yarn_id'] = $e['yarn']->getId();
  if (!is_null($e['manu'])) {
    $a['manuname'] = $e['manu']->getManuname();
  } else {
    $a['manuname'] = '';
  }
  $list[] = $a;
}

showView('views/user_list_owns.php', array('list' => $list), 'Omat langat');
