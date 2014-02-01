<?php
session_start();

function logged() {
    return isset($_SESSION['user']);
}

function loggedUser() {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        return NULL;
    }
}

function showView($sivu, $data = array()) {
    $data = (object)$data;
    require 'views/template.php';
    die();
} 


