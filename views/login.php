<div class="container column">
<form name="input" action="login.php" method="post" id="loginform">

<table><tr><td>
<div class="input-group">
  <span class="input-group-addon">Käyttäjänimi</span>   
   
  <input type="text" class="form-control" name="user" value="<?php 
  if (isset($data->user)) {
  echo htmlspecialchars($data->user);
}
?>">


</div>
</td></tr>
<tr><td>
<div class="input-group">
  <span class="input-group-addon">Salasana</span>
  <input type="password" class="form-control" name="pwd">
</div>
</td></tr>
<tr><td>
<input type="submit" class="btn btn-default" value="Kirjaudu sisään">
<a href="reg.php" class="btn btn-default">Rekisteröidy käyttäjäksi</a>
</td></tr>
</table>

</form>
</div>