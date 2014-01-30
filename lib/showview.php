<?php
function showView($sivu, $data = array()) {
	 echo 789;
    $data = (object)$data;
echo 333;
    require '../views/template.php';
    echo 111;
    die();
}