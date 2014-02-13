<div class="column">
<table style="width:100%;"><tr><td>
<form action="admin_yarn.php<?php
if ($data->action == 'modify') {
  echo '?action=modify&yarn_id='.$data->yarn_id;
}
if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST" id="yarnform">
<input type="hidden" name="filled" value="1">
<?php
if ($data->action == 'modify') {
  echo '<input type="hidden" name="yarn_id" value="'.$data->yarn_id.'">';
}
?>
<div class="input-group">
  <span class="input-group-addon">Nimi</span>
  <input type="text" class="form-control" name="yarnname" value="<?php
if (isset($data->yarnname)){
  echo htmlspecialchars($data->yarnname);
}
?>">
</div>
</td></tr>


<tr><td>
<div class="input-group">
  <span class="input-group-addon">Valmistaja</span>
 <?php
if (isset($data->yarnmanu)) {
  showManufield('yarnmanu', $data->yarnmanu);
} else {
  showManufield('yarnmanu');
}
?>
</div>
</td></tr>

<tr><td>
<div class="input-group">
<span class="input-group-addon">Puikkosuositus, min</span>
<?php
if (isset($data->nsrmin)) {
  showNsrfield('nsrmin',$data->nsrmin);
} else {
  showNsrfield('nsrmin');
}
?>
</div>
</td></tr>

<tr><td>
<div class="input-group">
<span class="input-group-addon">Puikkosuositus, max</span><?php
if (isset($data->nsrmax)) {
  showNsrfield('nsrmax', $data->nsrmax);
} else {
  showNsrfield('nsrmax');
}
?>
</div>
</td></tr>

<tr><td>
<div class="input-group">
<span class="input-group-addon">Pituus (100g)</span>
<input type="text" name="lpg" value="<?php
if (isset($data->lpg)) {
  echo htmlspecialchars($data->lpg);
}
?>" class="form-control">
</div>
</td></tr>

<tr><td>
<div class="input-group">
<span class="input-group-addon">Kuvaus</span>
<input type="text" name="description" value="<?php
if (isset($data->description)) {
  echo htmlspecialchars($data->description);
}
?>" class="form-control">
</div>
</td></tr>

<tr><td>
<div class="btn-group">
<input type="submit" value="<?php

if ($data->action == 'modify') {
  echo 'Muokkaa';
} else {
  echo 'Lisää lanka';
}

?>" class="btn btn-default"><a href="admin_list_yarns.php" class="btn btn-default">Takaisin</a>
</div>
</td></tr></table>
</form>
</div>