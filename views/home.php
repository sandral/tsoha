<h1>Tervetuloa, <?php echo trim($data->user); ?>!</h1>

Omat lankasi:<br>
<table>
<tr><th>Nimi</th><th>Määrä</th></tr>
<?php
foreach ($data->owns as $own) {
echo '<tr>';
echo '<td>';
echo '<a href="yarn.php?yarn_id='.$own['yarn']->getId().'">';
echo $own['yarn']->getYarnname().'</td><td>'.$own['amount'].'g';
echo '</a>';
echo '</td>';
echo '</tr>';
 }
?>
</table>
<br>
<a href="logout.php">Kirjaudu ulos</a>