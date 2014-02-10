<form action="yarn.php<?php
if ($data->action == 'modify') {
  echo '?action=modify&yarn_id='.$data->yarn->getId();
}
if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST" id="yarnform">
<input type="hidden" name="filled" value="1">
<?php
if ($data->action == 'modify') {
  echo '<input type="hidden" name="yarn_id" value="'.$data->yarn->getId().'">';
}
?>
<table>
<tr><td>Nimi:</td><td><input type="text" name="yarnname" value="<?php
if (isset($data->yarn)){
  echo htmlspecialchars($data->yarn->getYarnname());
}
?>"></td></tr>


<tr><td>Valmistaja:</td><td>
<?php
if (isset($data->manu)) {
  showManufield('yarnmanu',$data->manu->getId());
} else {
  showManufield('yarnmanu');
}
?>
</td></tr>


<tr><td>Puikkosuositus:</td><td><?php
if (isset($data->yarn)) {
  showNsrfield('nsrmin',$data->yarn->getNsrmin());
} else {
  showNsrfield('nsrmin');
}
?> - <?php
if (isset($data->yarn)) {
  showNsrfield('nsrmax', $data->yarn->getNsrmax());
} else {
  showNsrfield('nsrmax');
}
?></td></tr>


<tr><td>Pituus (100g):</td><td> <input type="text" name="lpg" value="<?php
if (isset($data->yarn)) {
  echo $data->yarn->getLpg();
}
?>"></td></tr>
<tr><td>Kuvaus:</td><td><input type="text" name="description" value="<?php
if (isset($data->yarn)) {
  echo $data->yarn->getDescription();
}
?>"></td></tr>
</table>

<br>

<input type="submit" value="<?php

if ($data->action == 'modify') {
  echo 'Muokkaa';
} else {
  echo 'Lisää lanka';
}

?>" class="btn btn-default">
</form>

<a href="home.php" class="btn btn-default">Takaisin</a>
