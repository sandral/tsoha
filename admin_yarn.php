<?php

require_once 'lib/lib.php';

checkAdmin();

if ($_GET['action'] == 'insert') {
  $title = 'Lisää lanka';
} else {
  $title = 'Muokkaa lankaa';
}

if (isset($_POST['filled'])) {

  $yarn_id = $_POST['yarn_id'];
  $yarnname = trim($_POST['yarnname']);
  $yarnmanu = $_POST['yarnmanu'];
  $nsrmin = $_POST['nsrmin'];
  $nsrmax = $_POST['nsrmax'];
  $lpg = $_POST['lpg'];
  $description = trim($_POST['description']);


  $attrs = array();
  foreach (Attr::listAttrs() as $attr) {
    if (isset($_POST['attr'.$attr->getId()]) && $_POST['attr'.$attr->getId()] == 'selected') {
      $attrs[] = $attr;
    }
  }

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

    $allattrs = Attr::listAttrs();

    showView('views/admin_yarn.php', array(
      'action' => $_GET['action'],
      'yarn_id' => $yarn_id,
      'yarnname' => $yarnname,
      'yarnmanu' => $yarnmanu,
      'nsrmin' => $nsrmin,
      'nsrmax' => $nsrmax,
      'lpg' => $lpg,
      'description' => $description,
      'attrlist' => $allattrs,
      'yarnattrs' => $attrs),
      $title
      );
  }

  if ($yarnmanu == -1) { $yarnmanu = NULL; } else { $yarnmanu = (int) $yarnmanu; }
  if (trim($lpg) == '') { $lpg = NULL; } else { $lpg = (int) $lpg; }

  if ($_GET['action'] == 'insert') {

    $new_id = Yarn::addYarn($yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
    Yarn::getYarnById($new_id)->setAttributes($attrs);
    showMessage('Lanka lisätty.');

  } else if ($_GET['action'] == 'modify') {

    $yarn_id = (int)$_POST['yarn_id'];
    Yarn::updateYarn($yarn_id, $yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description);
    Yarn::getYarnById($yarn_id)->setAttributes($attrs);
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

  $yarnattrs = $yarn->listAttributes();

   showView('views/admin_yarn.php', array(
    'action' => 'modify',
    'yarn_id' => $yarn_id,
    'yarnname' => $yarn->getYarnname(),
    'yarnmanu' => $yarnmanu,
    'nsrmin' => $yarn->getNsrmin(),
    'nsrmax' => $yarn->getNsrmax(),
    'lpg' => $yarn->getLpg(),
    'description' => $yarn->getDescription(),
    'attrlist' => Attr::listAttrs(),
    'yarnattrs' => $yarnattrs
    ), $title);

} else if ($_GET['action'] == 'insert') {
  showView('views/admin_yarn.php', array('action'=>'insert', 'attrlist' => Attr::listAttrs()), $title);
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

redirect('admin_yarn.php?action=insert');