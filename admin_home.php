<?php

require_once 'lib/lib.php';

checkAdmin();

showView('views/admin_home.php', array(), 'Hallintosivu');