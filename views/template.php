<!DOCTYPE HTML>
<html>
<head><title>Otsikko</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>
<body>
<?php
if (isset($data->error)){
echo '<div class="alert alert-danger">'.($data->error).'</div>';
}
?>
<div id="content">
<?php require $sivu; ?>
</div>
</body>
</html>
