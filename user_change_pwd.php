<?php

require_once 'lib/lib.php';

checkLogged();

if (isset($_POST['filled'])) {

  $password = $_POST['password1'];
  
  $error = false;

  if (!loggedUser()->passwordis($_POST['password_old'])) {
    showError('Annoit väärän salasanan.');
    $error = true;
  }

  if ($password != $_POST['password2']) {
    showError('Antamasi salasanat eivät täsmää.');
    $error = true;
  }
  
  if (strlen($password) < 3) {
   showError('Salasanan tulee olla vähintään 3 merkkiä pitkä.');
   $error = true;
  }
  
  if ($error) {
    showView('views/user_change_pwd.php', array(), 'Salasanan vaihto');
  } else {
    loggedUser()->changePwd($password);
    showMessage('Salasana vaihdettu onnistuneesti.');
    redirect('home.php');
  }
} else {
  showView('views/user_change_pwd.php', array(), 'Salasanan vaihto');  
}