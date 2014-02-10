<!DOCTYPE HTML>
<html>
<head><title>Lankatietokanta | <?php echo $title; ?></title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<meta charset="utf-8">
</head>
<body>
<div class="container" style="width:800px;">
<?php showNavbar(); ?>
<div class="panel panel-default">
<div class="panel-body">
<?php
if (isset($data->error)){
  echo '<div class="alert alert-danger">';
  echo implode("<br>\n",$data->error);
  echo '</div>';
}
if (isset($data->message)){
  echo '<div class="alert alert-success">';
  echo implode("<br>\n",$data->message);
  echo '</div>';
}
?>

<?php echo '<h3>'.$title.'</h3>'; ?>
<br>
<?php require $sivu; ?>
<br>
</div>
</div>
</div>
</body>
</html>
