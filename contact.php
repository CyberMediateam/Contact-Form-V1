<?php 
require("process.php");
$security2 = rand(33384, 899984);
$ip = $_SERVER["REMOTE_ADDR"];

?>

<html>
<title>Contact Us</title>
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
<li class="nav-item active">
<a class="nav-link" href="/contact.php" class="active">Contact Us <span class="sr-only">(trenutna)</span></a></li>
<li class="nav-item">
<a class="nav-link" href="#">Report Bug</a>
</li>
</ul>
</div>
</nav>



<div class="content">
<form action="process.php?page=send" method="POST">
<label>Naslov:</label> <input type="text" name="subject" id="subject"  required placeholder="Subject.."></input><br/>
<label>Email Addresa:</label> <input type="email" name="email" id="email" required placeholder="example@example.com"></input><br/>
<label>Poruka:</label> <textarea name="message" required style="resizable:false" width="auto" height="auto" placeholder="Your message..."></textarea><br/>
<label>Captcha:</label> <input type="text" name="security" required placeholder="<?php echo $security2 ?>"  title="Unesite brojeve koje vidite u polje!"></input><br/>
<input type="hidden" name="security2" value="<?php echo $security2?>"></input><br/>
<input type="submit" name="submit" class="btn" value="Kontaktuj nas"></input>
</form>
</div>

<div id="footer" class="footer">
<h4>Developed by <a href="#">CyberMediaTeam.</a>.Copyright &copy 2017.All rights reserved</h4>
</div>

