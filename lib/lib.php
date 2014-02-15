<?php

require_once 'connection.php';
require_once 'classes.php';
session_start();

function checkLogged() {
    if (!logged()) {
        redirect('login.php');
    }
}

function checkAdmin() {
    if (!admin()) {
        redirect('home.php');
    }
}


function logged() { return isset($_SESSION['user']); }
function loggedUser() { return $_SESSION['user']; }
function login($user) { $_SESSION['user'] = $user; }
function logout() { unset($_SESSION['user']); }
function admin() { return logged() && $_SESSION['user']->isAdmin(); }

function showView($sivu, $data = array(), $title = '&lt;otsikko&gt;') {
  if (isset($_SESSION['error'])) {
    $data['error'] = $_SESSION['error'];
    unset($_SESSION['error']);
  }

  if (isset($_SESSION['message'])) {
    $data['message'] = $_SESSION['message'];
    unset($_SESSION['message']);
  }

    $data = (object)$data;
    require 'views/template.php';
    exit();
} 

function showNsrfield($nsrfieldname, $nsrfieldselected = -1){ require 'views/nsrfield.php'; }
function showManufield($manufieldname, $manufieldselected = -1){ require 'views/manufield.php'; }
function showYarnfield($yarnfieldname, $yarnfieldselected = -1){ require 'views/yarnfield.php'; }

function redirect($sivu) {
  header('Location: '.$sivu);
  exit();
}

function showMenu() {
  if (logged()) {
    require 'views/menu.php';
  }
}

function showNavbar() {
  require 'views/navbar.php';
}

function showMessage($message) {
  if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = array();
  }
  $_SESSION['message'][] = $message;
}

function showError($message) {
  if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = array();
  }
  $_SESSION['error'][] = $message;
}