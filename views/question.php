<?php
echo $data->question;
?>
<br><br>
<?php
foreach ($data->choices as $choice) {
  echo '<a href="'.$choice[1].'" class="btn btn-default">'.$choice[0].'</a> ';
}
?>