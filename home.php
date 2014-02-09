<?php

require_once 'lib/lib.php';

checkLogged();

$loggedUser = loggedUser();

$yarnlist = Yarn::listYarnsWithManus();

showView('views/home.php', array('user' => $loggedUser->getUsername(), 'yarnlist' => $yarnlist), 'Tervetuloa, '.trim($loggedUser->getUsername()).'!');
