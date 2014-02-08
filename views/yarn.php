<h1>Langan tiedot</h1>

<form action="yarn.php">
<table>
<tr><td>Nimi:</td><td><input type="text" value="<?php echo htmlspecialchars($data->yarn->getYarnname());?>"></td></tr>
<tr><td>Valmistaja:</td><td><input type="text" value="<?php echo htmlspecialchars($data->manu->getManuname());?>"></td></tr>
<tr><td>Puikkosuositus:</td><td><input type="text" value="<?php echo $data->yarn->getNsrmin();?>"> - <input type="text" value="<?php echo $data->yarn->getNsrmax();?>"></td></tr>
<tr><td>Pituus (100g):</td><td><input type="text" value="<?php echo $data->yarn->getLpg();?>"></td></tr>
<tr><td>Kuvaus:</td><td><input type="text" value="<?php echo $data->yarn->getDescription();?>"></td></tr>
</table>
</form>

<br>
<a href="home.php">Etusivu</a>
<br><br>
<a href="logout.php">Kirjaudu ulos</a>