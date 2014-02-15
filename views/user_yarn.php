<form class="form-horizontal" role="form">

<div class="form-group">
  <label class="col-sm-3 control-label">Nimi</label>
  <div class="col-sm-6">
    <p class="form-control-static"><?php
if (isset($data->yarnname)){
  echo htmlspecialchars($data->yarnname);
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">Valmistaja</label>
  <div class="col-sm-6">
    <p class="form-control-static"><?php
if (isset($data->yarnmanu)){
  echo htmlspecialchars(Manu::getManuById($data->yarnmanu)->getManuname());
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">Puikkosuositus</label>
  <div class="col-sm-6">
    <p class="form-control-static"><?php
if (isset($data->nsrmin) && isset($data->nsrmax)){
  echo htmlspecialchars($data->nsrmin.' - '.$data->nsrmax);
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">Pituus (100 g)</label>
  <div class="col-sm-6">
    <p class="form-control-static"><?php
if (isset($data->lpg)){
  echo htmlspecialchars($data->lpg).' m';
}
?></p>
  </div>
</div>

  <div class="form-group">
    <label for="amount" class="col-sm-3 control-label">Määrä</label>
    <div class="col-sm-6">
    <div class="input-group">
      <input type="text" class="form-control" id="amount" value="<?php
echo $data->amount;
?>">
    <span class="input-group-addon">g</span>
    </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
<div class="btn-group">
<input type="submit" value="Päivitä" class="btn btn-default"><a href="user_list_owns.php" class="btn btn-default">Takaisin</a>
</div>
    </div>
  </div>


</form>


</div>