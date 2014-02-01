<?php

require_once 'lib/class_user.php';
require_once 'lib/lib.php';

if (logged()){
echo "Kirjautunut:";
$us = loggedUser();
echo var_export($us);
echo $us->fun();
echo loggedUser()->getUsername();
} else {
echo "Not logged!";
}