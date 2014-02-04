<h1>Tervetuloa, <?php echo trim($data->user); ?>!</h1>

<?php
echo var_export($data);
foreach ($data->owns as $own) {
echo 12;
  echo $own->getAmount();
}
?>

<a href="logout.php">Kirjaudu ulos</a>