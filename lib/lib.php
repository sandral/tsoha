<?php

require_once 'connection.php';
require_once 'classes.php';
session_start();

function checkLogged() {
    if (!logged()) {
        header('Location: login.php');
	exit();
    }
}

function logged() { return isset($_SESSION['user']); }
function loggedUser() { return $_SESSION['user']; }
function login($user) { $_SESSION['user'] = $user; }
function logout() { unset($_SESSION['user']); }

function showView($sivu, $data = array(), $title = '&lt;otsikko&gt;') {
    $data = (object)$data;
    require 'views/template.php';
    exit();
} 

function showNsrfield($nsrfieldname, $nsrfieldselected){ require 'views/nsrfield.php'; }

function redirect($sivu) {
  header('Location: '.$sivu);
  exit();
}

function showMenu() { require 'views/menu.php'; }