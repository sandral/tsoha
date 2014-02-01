<?php

require_once 'lib/lib.php';
require_once 'lib/class_user.php';

if (logged()){
echo "Kirjautunut:";
echo var_export($_SESSION);
echo loggedUser();
} else {
echo "Not logged!";
}