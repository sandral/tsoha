<?php

session_start();
require_once 'connection.php';

function logged() {
    return isset($_SESSION['user']);
}

function checkLogged() {
    if (!logged()) {
        header('Location: login.php');
	exit();
    }
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

