<h1>Tervetuloa, <?php echo trim($data->user); ?>!</h1>

<?php
foreach ($data->owns as $own) {
  echo $own->getYarn();
  echo Yarn::getYarnById($own->getYarn())->getYarnname()." Lukumäärä:".$own->getAmount()."<br> ";
 }
?>
<br>
<a href="logout.php">Kirjaudu ulos</a>