<h1>Langan tiedot</h1>

<form action="yarn.php">
<table>
<tr><td>Nimi:</td><td><?php echo $data->yarn->getYarnname();?></td></tr>
<tr><td>Valmistaja:</td><td><?php echo $data->manu->getManuname(); ?></td></tr>
<tr><td>Puikkosuositus:</td><td><?php echo $data->yarn->getNsrmin();?> - <?php echo $data->yarn->getNsrmax();?></td></tr>
<tr><td>Pituus (100g):</td><td><?php echo $data->yarn->getLpg();?></td></tr>
<tr><td>Kuvaus:</td><td><?php echo $data->yarn->getDescription();?></td></tr>
</table>
</form>

<br>
<a href="logout.php">Kirjaudu ulos</a>