<?php

session_start();

function logged() {
    return isset($_SESSION['user']);
}

function loggedUser() {
    return $_SESSION['user'];
}

function login($user) {
    $_SESSION['user'] = $user;
}

function logout() {
    unset($_SESSION['user']);
}


function showView($sivu, $data = array()) {
    $data = (object)$data;
    require 'views/template.php';
    die();
} 

