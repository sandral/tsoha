<form action="admin_manu.php<?php
if ($data->action == 'modify') {
  echo '?action=modify&manu_id='.$data->manu_id;
}
if ($data->action == 'insert') {
  echo '?action=insert';
}

?>" method="POST">
<input type="hidden" name="filled" value="1">
<?php
if ($data->action == 'modify') {
  echo '<input type="hidden" name="manu_id" value="'.$data->manu_id.'">';
}
?>

<form name="input" action="login.php" method="post" id="loginform">
<div class="input-group">
<span class="input-group-addon">Valmistajan nimi</span>
<input type="text" class="form-control" name="manuname" value="<?php
if (isset($data->manuname)){
  echo trim(htmlspecialchars($data->manuname));
}
?>">
</div>


<br>

<input type="submit" value="<?php

if ($data->action == 'modify') {
  echo 'Muokkaa';
} else {
  echo 'Lisää valmistaja';
}

?>" class="btn btn-default"> <a href="admin_list_manus.php" class="btn btn-default">Takaisin</a>
</form>

