<select name="<?php echo $manufieldname;?>">

<?php
$manus = Manu::listManus();
foreach ($manus as $manu) {
  echo '<option value="'.$manu->getId().
       '"';
  if ($manufieldselected == $manu->getId()){
    echo ' selected';
  }
  echo '>'.$manu->getName().'</option>';
}
?>

</select>