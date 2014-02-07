<h1>Tervetuloa, <?php echo trim($data->user); ?>!</h1>

<?php
foreach ($data->owns as $own) {
  echo Yarn::getYarnById($own->getYarn())." Lukumäärä:".$own->getAmount()."<br> ";
 }
?>
<br>
<a href="logout.php">Kirjaudu ulos</a>