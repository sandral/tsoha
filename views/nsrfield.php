<select name="<?php echo $nsrfieldname; ?>" size="">
<?php
$list = array(0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12);
foreach ($list as $value) {
  if ($value == $nsrfieldselected){
    echo '<option value="'.$value.'" selected>'.$value.'</option>';
  } else {
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
}
?>
</select>