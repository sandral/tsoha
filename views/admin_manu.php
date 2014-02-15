<form action="admin_manu.php<?php
if ($data->action == 'modify') {
  echo '?action=modify&manu_id='.$data->manu_id;
}
if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST" class="form-horizontal" role="form">

<input type="hidden" name="filled" value="1">
<?php if ($data->action == 'modify') { echo '<input type="hidden" name="manu_id" value="'.$data->manu_id.'">'; } ?>


<div class="form-group">
  <label class="col-sm-3 control-label">Valmistajan nimi</label>
  <div class="col-sm-6">
<input type="text" class="form-control" name="manuname" value="<?php
if (isset($data->manuname)){
  echo trim(htmlspecialchars($data->manuname));
}
?>">
  </div>
</div>


<div class="form-group">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
<div class="btn-group">
<input type="submit" value="<?php

if ($data->action == 'modify') {
  echo 'Muokkaa';
} else {
  echo 'Lisää valmistaja';
}

?>" class="btn btn-default"> <a href="admin_list_manus.php" class="btn btn-default">Takaisin</a>
</div>

  </div>
</div>

</form>