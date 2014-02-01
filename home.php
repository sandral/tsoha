<?php

require_once 'lib/lib.php';
require_once 'lib/class_user.php';

if (logged()){
echo "Kirjautunut:";
$us = loggedUser();
echo var_export($us);
echo $us->username;
echo loggedUser()->getUsername();
} else {
echo "Not logged!";
}