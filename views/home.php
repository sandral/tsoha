<h1>Tervetuloa, <?php echo trim($data->user); ?>!</h1>

<table>
<?php
foreach ($data->owns as $own) {
echo '<tr>';
echo '<td>'.$own->yarn->getYarnname().'</td><td>'.$own->amount.'</td>';
echo '</tr>';
 }
?>
</table>
<br>
<a href="logout.php">Kirjaudu ulos</a>