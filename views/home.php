<?php /*Omat lankasi:<br>*/ ?>
<table>
<tr><th>Nimi</th><th>Valmistaja</th><th>Puikkosuositus</th><th>Pituus/100g</th><th>Kuvaus</th></tr><td></td>
<?php
foreach ($data->yarnlist as $own) {
echo '<tr>';
echo '<td>'.($own['yarn']->getYarnname()).'</td>';
echo '<td>'.($own['manu']->getManuname()).'</td>';
echo '<td>'.($own['yarn']->getNsrmin()).' - '.($own['yarn']->getNsrmax()).'</td>';
echo '<td>'.($own['yarn']->getLpg()).' m</td>';
echo '<td>'.($own['yarn']->getDescription()).'</td>';
echo '<td>';
echo '<a href="yarn.php?yarn_id='.$own['yarn']->getId().'">Muokkaa</a>';
echo '</td></tr>';
 }
?>
</table>
<br><br>
<a href="addyarn.php">Lisää lanka</a>