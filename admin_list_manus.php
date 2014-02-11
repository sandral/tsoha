<?php

require_once 'lib/lib.php';

checkAdmin();

$list = Manu::listManus();

showView('views/admin_list_manus.php', array('list' => $list), 'Valmistajien muokkaus');
