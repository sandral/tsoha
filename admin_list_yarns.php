<?php

require_once 'lib/lib.php';

checkAdmin();

$yarnlist = Yarn::listYarnsWithManus();

showView('views/admin_list_yarns.php', array('yarnlist' => $yarnlist), 'Lankojen muokkaus');
