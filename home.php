<?php

require_once 'lib/lib.php';
require_once 'lib/class_user.php';

if (logged()){
echo "Kirjautunut:";
echo loggedUser()->username;
} else {
echo "Not logged!";
}