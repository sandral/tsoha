<table class="table">
<tr><th>Nimi</th><th>Valmistaja</th><th>Puikkosuositus</th><th>Pituus/100g</th><th>Kuvaus</th><td></td><td></td></tr>
<?php
foreach ($data->yarnlist as $own) {
echo '<tr>';
echo '<td>'.($own['yarn']->getYarnname()).'</td>';
echo '<td>'.($own['manu']->getManuname()).'</td>';
echo '<td>'.($own['yarn']->getNsrmin()).' - '.($own['yarn']->getNsrmax()).'</td>';
echo '<td>'.($own['yarn']->getLpg()).' m</td>';
echo '<td>'.($own['yarn']->getDescription()).'</td>';
echo '<td><a href="yarn.php?yarn_id='.$own['yarn']->getId().'">Muokkaa</a></td>';
echo '<td><a href="yarn.php?yarn_id='.$own['yarn']->getId().'&delete=1">Poista</a></td>';
echo '</tr>';
 }
?>
</table>