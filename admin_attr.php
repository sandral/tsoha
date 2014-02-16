<?php

require_once 'lib/lib.php';

checkAdmin();

if ($_GET['action'] == 'insert') {
  $title = 'Lisää ominaisuus';
} else {
  $title = 'Muokkaa ominaisuutta';
}

if (isset($_POST['filled'])) {

  $attrname = trim($_POST['attrname']);
  $errorhappened = false;

  if ($attrname == '') {
     showError('Ominaisuus ei voi olla tyhjä.');
    $errorhappened = true;
  }

  if ($errorhappened) {
    showView('views/admin_attr.php', array(
      'action' => $_GET['action'],
      'attrname' => $attrname),
      $title
      );
  }

  if ($_GET['action'] == 'insert') {

    Attr::addAttr($attrname);
    showMessage('Ominaisuus lisätty.');

  } else if ($_GET['action'] == 'modify') {

    $attr_id = (int)$_POST['attr_id'];
    Attr::updateAttr($attr_id, $attrname);
    showMessage('Ominaisuus päivitetty.');
  }

  redirect('admin_list_attrs.php');
}

if ($_GET['action'] == 'modify' && isset($_GET['attr_id'])){

  $attr_id = (int)$_GET['attr_id'];
  $attr = Attr::getAttrById($attr_id);

  if (is_null($attr)) {
    redirect('admin_list_attrs.php');
  }

  showView('views/admin_attr.php', array(
    'action' => 'modify',
    'attr_id' => $attr_id,
    'attrname' => $attr->getAttrname()
    ), $title);

} else if ($_GET['action'] == 'insert') {
  showView('views/admin_attr.php', array('action'=>'insert'), $title);
} else if ($_GET['action'] == 'delete' && isset($_GET['attr_id'])) {
  $attr_id = (int)$_GET['attr_id'];
  $attr = Attr::getAttrById($attr_id);

  showView('views/question.php',
                  array('question' => 'Oletko varma, että haluat poistaa ominaisuuden?',
                        'choices' => array(array('Kyllä', 'admin_attr.php?action=deleteconfirm&attr_id='.$attr->getId()),
                                           array('En', 'admin_list_attrs.php')
                                          )
                       ), 'Ominaisuuden poisto');

} else if ($_GET['action'] == 'deleteconfirm' && isset($_GET['attr_id'])) {
  $attr_id = (int)$_GET['attr_id'];
  $attr = Attr::getAttrById($attr_id);

  Attr::deleteAttr($attr->getId());
  showMessage('Ominaisuus poistettu.');
  redirect('admin_list_attrs.php');
}

redirect('admin_attr.php?action=insert');