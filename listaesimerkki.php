<?php

require_once('lib/class_user.php');

$users = User::getUsers();
?><!DOCTYPE HTML>

<html>

<head><title>Title</title></head>

<body>
<?php

foreach ($users as $user) {
  echo $user->username;
  echo '<br>\n';
}

?>
</body>

</html>