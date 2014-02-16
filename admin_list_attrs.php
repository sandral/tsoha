<?php

require_once 'lib/lib.php';

checkAdmin();

$list = Attr::listAttrs();

showView('views/admin_list_attrs.php', array('list' => $list), 'Ominaisuuksien muokkaus');
