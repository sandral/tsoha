<form action="admin_yarn.php<?php
if ($data->action == 'modify') {
  echo '?action=modify&yarn_id='.$data->yarn_id;
}
if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST" id="yarnform" class="form-horizontal" role="form">
<input type="hidden" name="filled" value="1">
<?php
if ($data->action == 'modify') {
  echo '<input type="hidden" name="yarn_id" value="'.$data->yarn_id.'">';
}
?>

<div class="col-sm-8">

<div class="form-group">
  <label class="col-sm-4 control-label">Nimi</label>
  <div class="col-sm-8">
  <input type="text" class="form-control" name="yarnname" value="<?php
if (isset($data->yarnname)){
  echo htmlspecialchars($data->yarnname);
}
?>">
  </div>
</div>



<div class="form-group">
  <label class="col-sm-4 control-label">Valmistaja</label>
  <div class="col-sm-8">
 <?php
if (isset($data->yarnmanu)) {
  showManufield('yarnmanu', $data->yarnmanu);
} else {
  showManufield('yarnmanu');
}
?>
</div>
</div>



<div class="form-group">
<label class="col-sm-4 control-label">Puikkosuositus</label>
<div class="col-sm-4">
<?php
if (isset($data->nsrmin)) {
  showNsrfield('nsrmin',$data->nsrmin);
} else {
  showNsrfield('nsrmin');
}
?>
</div>
<div class="col-sm-4">
<?php
if (isset($data->nsrmax)) {
  showNsrfield('nsrmax',$data->nsrmax);
} else {
  showNsrfield('nsrmax');
}
?>
</div>
</div>



<div class="form-group">
<label class="col-sm-4 control-label">Pituus (100g)</label>
<div class="col-sm-8">
<input type="text" name="lpg" value="<?php
if (isset($data->lpg)) {
  echo htmlspecialchars($data->lpg);
}
?>" class="form-control">
</div>
</div>



<div class="form-group">
<label class="col-sm-4 control-label">Kuvaus</label>
<div class="col-sm-8">
<input type="text" name="description" value="<?php
if (isset($data->description)) {
  echo htmlspecialchars($data->description);
}
?>" class="form-control">
</div>
</div>


<div class="form-group">
 <div class="col-sm-4"></div>
 <div class="col-sm-8">
  <div class="btn-group">
  <input type="submit" value="<?php

if ($data->action == 'modify') {
  echo 'Muokkaa';
} else {
  echo 'Lisää lanka';
}

?>" class="btn btn-default"><a href="admin_list_yarns.php" class="btn btn-default">Takaisin</a>
  </div>
 </div>
</div>

</div>

<div class="col-sm-4">
<?php
foreach($data->attrlist as $attr) {
  echo '<input type="checkbox" name="attr'.$attr->getId().'" value="selected"';
  
  $found = false;

  foreach ($data->yarnattrs as $yarnattr) {
    if ($yarnattr->getId() == $attr->getId()){
      $found = true;
    }
  }

  if ($found) {
    echo ' checked';
  }

  echo '>'.' '.$attr->getAttrname().'<br>';
}
?>

</div>

</form>
