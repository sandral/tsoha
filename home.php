<?php

require_once 'lib/class_user.php';
require_once 'lib/lib.php';

if (logged()){
echo "Kirjautunut:";
echo loggedUser()->getUsername();
} else {
header('Location: login.php');
exit();
}

echo '<br><br>';
echo '<a href="logout.php"> Logout </a>';