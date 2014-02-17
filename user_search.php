<?php

require_once 'lib/lib.php';

checkLogged();

if (isset($_POST['filled'])) {

  $results = Yarn::search(trim($_POST['search']));
  
  showView('views/user_search_results.php', array('results' => $results), 'Hakutulokset');

} else {
  showView('views/user_search.php', array(), 'Hae lankaa');
}
