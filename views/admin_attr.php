<form action="admin_attr.php<?php
if ($data->action == 'modify') {
  echo '?action=modify&attr_id='.$data->attr_id;
}
if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST" class="form-horizontal" role="form">

<input type="hidden" name="filled" value="1">
<?php if ($data->action == 'modify') { echo '<input type="hidden" name="attr_id" value="'.$data->attr_id.'">'; } ?>


<div class="form-group">
  <label class="col-sm-3 control-label">Anna ominaisuus</label>
  <div class="col-sm-6">
<input type="text" class="form-control" name="attrname" value="<?php
if (isset($data->attrname)){
  echo trim(htmlspecialchars($data->attrname));
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
  echo 'Lisää Ominaisuus';
}

?>" class="btn btn-default"> <a href="admin_list_attrs.php" class="btn btn-default">Takaisin</a>
</div>

  </div>
</div>

</form>