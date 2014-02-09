<?php
echo $data->question;
?>
<br>
<?php
foreach ($data->choices as $choice) {
  echo '<a href="'.$choice[1].'">'.$choice[0].'</a> ';
}
?>