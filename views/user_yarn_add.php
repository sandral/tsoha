<form action="user_yarn.php<?php

if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST" id="yarnform" class="form-horizontal" role="form">
<input type="hidden" name="filled" value="1">

<div class="form-group">
  <label class="col-sm-3 control-label">Lanka</label>
  <div class="col-sm-6">
<?php if (isset($data->yarn_id)) {
      showYarnfield('yarn', $data->yarn_id);  
      }
      else {
      	   showYarnfield('yarn');
      	   }
?>
  </div>
</div>

  <div class="form-group">
    <label for="amount" class="col-sm-3 control-label">Määrä</label>
    <div class="col-sm-6">
    <div class="input-group">
      <input type="text" name="amount" class="form-control" id="amount" value="<?php
?>">
    <span class="input-group-addon">g</span>
    </div>
    </div>
  </div>

<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div class="btn-group">
<input type="submit" value="Lisää lanka" class="btn btn-default"><a href="user_list_owns.php" class="btn btn-default">Takaisin</a>
</div>
</div>
</div>
</form>
