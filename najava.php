<?php
require("process.php");
?>
<html>
     <title>Najava</title>

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
  <li class="nav-item">
  <a class="nav-link" href="/index.php">Home</a>
  </li>
  <li class="nav-item">
<a class="nav-link" href="/forum">Forum</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/contact.php" class="active">Contact Us <span class="sr-only">(trenutna)</span></a></li>
<li class="nav-item">
<a class="nav-link" href="#">Report Bug</a>
</li>
<li class="nav-item active">
<a class="nav-link" href="#">Log In <span class="sr-only">(trenutna)</span></a>
</li>
</ul>
</div>
</nav>

<div class="content">
<form action="process.php?task=login" method="POST">
<label>Username:</label> <input type="text" name="username" required placeholder="Username"></input><br/>
<label>Password:</label> <input type="password" name="password" required></input><br/>
<input type="submit" name="submit" class="btn" value="Log In"></input>
</form>
</div>


<div id="footer" class="footer">
<h4>Developed by <a href="#">CyberMediaTeam.</a><br/>Copyright &copy 2017.All rights reserved</h4>
</div>
