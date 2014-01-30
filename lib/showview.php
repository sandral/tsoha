<?php
function showView($sivu, $data = array()) {
	 echo 789;
    $data = (object)$data;
    require '../views/template.php';
    echo 111;
    die();
}