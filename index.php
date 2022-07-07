<?php


require("process.php");
$ip = $_SERVER["REMOTE_ADDR"];
?>

<html>
<title>Kontakt Forma v1.0b</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css"/>
<script type="text/javascript" href="js/bootstrap.js"></script>
<script type="text/javascript" href="js/bootstrap.min.js"></script>


<nav class="navbar navbar-toggleable navbar-inverse bg-inverse" role="navigation">
 <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
  <!-- Navbar content -->
  <li class="nav-item active">
  <a class="nav-link" href="index.php">Home</a>
  </li>
  <li class="nav-item">
<a class="nav-link" href="/forum">Forum</a>
</li>
<li class="nav-item">
<a class="nav-link" href="contact.php" class="active">Contact Us <span class="sr-only">(trenutna)</span></a></li>
<li class="nav-item">
<a class="nav-link" href="#">Report Bug</a>
</li>
</ul>
</div>
</nav>


<div class="content">
<h4>Use this form to contact us.<br/>We will respond on your message after 24-48hrs.</h4>
</div>
</html>

<div id="footer">
<h4>Developed and Designed by <a href="#">CyberMediaTeam.</a><br/>Copyright &copy 2017.All rights reserved</h4>
</div>

