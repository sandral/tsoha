<?php

require_once 'lib/lib.php';
	     	    
if (isset($_POST['filled'])) {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $error = false;

  if ($username == "") {
    showError('Käyttäjätunnus ei voi olla tyhjä.');
    $error = true;
  }

  if (strlen($password) < 3) {
    showError('Salasanan tulee olla vähintään 3 merkkiä pitkä.');
    $error = true;
  }

  if ($error) {
    showView('views/reg.php', array('username' => $username), 'Rekisteröityminen');
  } else {
    User::addUser($username, $password);
    showMessage('Käyttäjätunnuksesi on rekisteröity.');
    redirect('home.php');
  }
} else {
  showView('views/reg.php', array(), 'Rekisteröityminen');
}