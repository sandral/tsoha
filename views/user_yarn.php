<form action="user_yarn.php?action=modify&yarn_id=<?php echo ($data->yarn_id); ?>" method="post" class="form-horizontal" role="form">

<div class="col-sm-12">
<a href="user_list_owns.php" class="btn btn-default">Takaisin</a>
</div>

<input type="hidden" name="filled" value="1">

<div class="col-sm-8">

<div class="form-group">
  <label class="col-sm-4 control-label">Nimi</label>
  <div class="col-sm-8">
    <p class="form-control-static"><?php
if (isset($data->yarnname)){
  echo htmlspecialchars($data->yarnname);
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Valmistaja</label>
  <div class="col-sm-8">
    <p class="form-control-static"><?php
if (isset($data->yarnmanu) && $data->yarnmanu != -1){
  echo htmlspecialchars(Manu::getManuById($data->yarnmanu)->getManuname());
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Puikkosuositus</label>
  <div class="col-sm-8">
    <p class="form-control-static"><?php
if (isset($data->nsrmin) && isset($data->nsrmax)){
  echo htmlspecialchars($data->nsrmin.' - '.$data->nsrmax);
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Pituus (100 g)</label>
  <div class="col-sm-8">
    <p class="form-control-static"><?php
if (isset($data->lpg)){
  echo htmlspecialchars($data->lpg).' m';
}
?></p>
  </div>
</div>


<div class="form-group">
  <label class="col-sm-4 control-label">Kuvaus</label>
  <div class="col-sm-8">
    <p class="form-control-static"><?php
if (isset($data->description)){
  echo htmlspecialchars($data->description);
}
?></p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">Ominaisuudet</label>
  <div class="col-sm-8">
    <p class="form-control-static"><?php
    foreach($data->attrs as $attr) {
      echo htmlspecialchars($attr->getAttrname()).'<br>';
    } 

?></p>
  </div>
</div>



</div>

<div class="col-sm-4">

  <div class="form-group">
    <label for="amount" class="col-sm-3 control-label">Määrä</label>
    <div class="col-sm-9">
    <div class="input-group">
      <input type="text" name="amount" class="form-control" id="amount" value="<?php
echo $data->amount;
?>">
    <span class="input-group-addon">g</span>
    </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
<input type="submit" value="Päivitä määrä" class="btn btn-default">
    </div>
  </div>

</div>


</form>


</div>