<a href="admin_attr.php?action=insert" class="btn btn-default">Lisää ominaisuus</a><br><br>
<table class="table column">
<tr><th>Nimi</th><td style="width:80px;"></td><td style="width:80px;"></td></tr>
<?php

foreach ($data->list as $e) {
  echo '<tr>';
  echo '<td>'.htmlspecialchars($e->getAttrname()).'</td>';

  echo '<td class="text-right"><a href="admin_attr.php?action=modify&attr_id='.$e->getId().'">Muokkaa</a></td>';
  echo '<td class="text-right"><a href="admin_attr.php?action=delete&attr_id='.$e->getId().'">Poista</a></td>';
  echo '</tr>';
}

?>

</table>
