<?php

session_start();

function logged() {
    return isset($_SESSION['user']);
}

function loggedUser() {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        return 'kakka';
    }
    return 'asd';
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

