<?php

require_once 'lib/lib.php';
require_once 'lib/class_user.php';

if (logged()){
echo "Kirjautunut:";
echo var_export(loggedUser()->getUsername());
echo 12;
} else {
echo "Not logged!";
}