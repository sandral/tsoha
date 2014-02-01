<?php

require_once 'lib/lib.php';
require_once 'lib/class_user.php';


echo 1;
if (logged()){
echo loggedUser()->username;
} else {
echo "Not logged!";
}