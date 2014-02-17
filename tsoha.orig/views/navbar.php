<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<?php
if (logged()){
  echo '<a class="navbar-brand" href="home.php">Lankatietokanta</a>';
} else {
  echo '<a class="navbar-brand" href="login.php">Lankatietokanta</a>';
}
?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<?php
if (logged()){
  echo '<li><a href="home.php">Langat</a></li>
  <li><a href="yarn.php?action=insert">Lisää lanka</a></li>';
}
?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
<?php
if (logged()) {
  echo '<li><a href="logout.php">Kirjaudu ulos</a></li>';
}
?>
      </ul>
    </div>
  </div>
</nav>