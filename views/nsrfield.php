<select name="<?php echo $nsrfieldname; ?>" class="form-control">
<?php
$list = array(0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 9, 10, 11, 12);
foreach ($list as $value) {
  if ($value == $nsrfieldselected){
    echo '<option value="'.$value.'" selected>'.$value.'</option>';
  } else {
    echo '<option value="'.$value.'">'.$value.'</option>';
  }
}
?>
</select>