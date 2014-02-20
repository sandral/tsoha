<form action="reg.php" method="POST" class="form-horizontal" role="form">

<input type="hidden" name="filled" value="1">

<div class="form-group">
  <label class="col-sm-3 control-label">Käyttäjätunnus</label>
  <div class="col-sm-6">
<input type="text" class="form-control" name="username" value="<?php
if (isset($data->username)) {
  echo htmlspecialchars($data->username);
}
?>">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label">Salasana</label>
  <div class="col-sm-6">
<input type="password" class="form-control" name="password"><br>
Salasanan tulee olla vähintään 3 merkkiä pitkä.
  </div>
</div>
<div class="btn-group">
<input type="submit" value="Rekisteröidy" class="btn btn-default">
</div>
</form>
