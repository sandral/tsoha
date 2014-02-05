<h1>Tervetuloa, <?php echo trim($data->user); ?>!</h1>

<?php
foreach ($data->owns as $own) {
  echo $own->getAmount();
  echo $own->geYarn();
}
?>

<a href="logout.php">Kirjaudu ulos</a>