<?php 
require("process.php");
error_reporting(0);

if($_SESSION["id"] == "") {
	header("Location:najava.php");
	exit;
}
$mejlovi = $db->query("SELECT * FROM `messages`");
$ukupno = $mejlovi->num_rows;
?>

<html>
    <title> Admin Panel </title>

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
  <a class="nav-link" href="admin.php">Pocetna</a>
  </li>
  <li class="nav-item">
<a class="nav-link" href="admin.php?page=mails">Mejlovi</a>
</li>
<li class="nav-item ">
<a class="nav-link" href="admin.php?page=logs">Logovi</a></li>
<li class="nav-item">
<a class="nav-link" href="#">Report Bug</a>
</li>
<li class="nav-item">
<a class="nav-link" href="logout.php">Log Out</a>
</li>
</ul>
</div>
</nav>


<div class="content">
<h4>Ovde mozete upravljati sajtom, izmeniti ovu poruku i slicno.</h4><br/><br/>
<div class="box1">
<h4>Statistika:<br/>Imate ukupno <?php echo $ukupno ?> mejlova.</h4>
</div>

</div>



<?php
$rezultat = $db->query("SELECT * FROM `logovi`");
$kver = $rezultat->fetch_array();


 if($_GET["page"] == "mails")
{
	
}

if($_GET["page"] == "logs")
{
	if($_SESSION["rank"] == 1) {
		$_SESSION["greska"] = "Nemate pristup ovoj stranici!";
		exit;
	} else {
		?>
		<div class="content">
		<table width="880px" height="222px" border="1" cellspacing="0" cellpadding="0" name="list-logs" class="list-logs">
		<tr>
		<th>IP</th>
		<th>Detalji</th>
		<th>Datum</th>
		</tr>
		
		<?php 
		$kver1 = $db->query("SELECT * FROM `logovi`");
		if(!$kver1) {
			die("mysqli:" . $db->error);
		}
		
		while($kver =$kver1->fetch_array()) {
			$ips = ($kver["IP"]);
			$detalje = ($kver["Detalje"]);
			$datums = ($kver["datum"]);
			
			
			?>
			<tr>
			<td><?php echo $kver["IP"] ?></td>
		<td><?php echo $kver["Detalje"] ?></td>
		<td><?php echo $kver["datum"] ?></td>
		</tr>
		<?php 
			
		}
		?>
		
		
		</table>
		</div>
		<?php
		
	}
}


if($_GET["page"] == "mails")
{
	?>
	<div class="content">
	
	<table width="100%"  cellpadding="0" border="1" cellspacing="0" class="list-logs">
	<tr>
	<th>ID</th>
	<th>Naslov</th>
	<th>Datum</th>
	</tr>
	
	<?php 
	$kver5 = $db->query("SELECT * FROM `messages`");
	
	while($mail = $kver5->fetch_array())
	{
		$idd2  = ($mail['id']);
		$naslov = ($mail["Subject"]);
		$datum = ($mail["Date"]);
		
		?>
		<tr>
		<td><?php echo $idd2 ?></td>
		<td><a href="?page=viewmail&id=<?php echo $idd2?>"><?php echo $naslov?></a></td>
		<td><?php echo $datum ?></td>
		</tr>
		

        

		<?php
		
		?>
		
		
		</div>
		<?php 
	}
}

if($_GET["page"] == "viewmail")
{
	$_GET["id"] == htmlspecialchars($db->escape_string(slash($_GET["id"])));
	
	$kver55 = $db->query("SELECT * FROM `messages`");
	if(!$kver55) {
		die("Mysqli:" . $db->error);
	}
	
	while($abc = $kver55->fetch_array())
	{
		$iid = ($abc["id"]);
		$sub = ($abc["Subject"]);
		$clie = ($abc["Client Email"]);
		$por = ($abc["Message"]);
		$datum = ($abc["date"]);
		$cliip = ($abc["IP"]);
		if(!$abc) {
			die("Mysqli:" . $db->error);
		}
		
		if($_GET["id"] == "$iid")
		{
			?>
		
			<div class="content" style=" right:80px;">
			<div class="box1" style="text-align:left;">
			<label>ID:</label> <input type="text" name="idd" readonly value="<?php echo $iid ?>"></input><br/>
			<label>Naslov:</label> <input type="text" name="naslov" readonly value="<?php echo $sub ?>"></input><br/>
			<label>Client Email:</label> <input type="email" name="email" readonly value="<?php echo $clie?>"></input><br/>
			<label>Poruka:</label> <textarea name='poruka' readonly><?php echo $por?></textarea>
			<input type="submit" name="submit" class="btn" onclick="location.href='?page=odgovori&id=<?php echo $iid?>'"></input>
			
			
			
			</div>
			</div>
			<?php
		}
	}
}


if($_GET["page"] == "odgovori")
{
	$_GET["id"] == htmlspecialchars($db->escape_string(slash($_GET["id"])));
	
	$kver99 = $db->query("SELECT * FROM `messages`");
	if(!$kver99) {
		die("" . $db->error());
	}
	while($kver01 = $kver99->fetch_array())
	{
		$uiid = ($kver01['id']);
		
		if(!$kver01) {
			die("".$db->error);
		}
		
		if($_GET["id"] == "$uiid") {
			?>
			<div class="content">
			<form action="process.php?akcija=odgovor" method="POST">
			<label>Do:</label> <input type="email" name="email" readonly value="<?php echo $kver01['Client Email'] ?>"></input><br/>
			<label>Naslov: <input type="text" name="naslov" readonly value="<?php echo $kver01["Subject"]?>"></input><br/>
			<label>Poruka:</label> <textarea name="poruka" required placeholder="Vasa poruka"></textarea>
			<input type="submit" name="submit" class="btn" value="Odgovori"></input>
			<input type="hidden" name="id-poruke" value="<?php echo $uiid ?>"></input>
			</form>
			</div>
			<?php 
		}
	}
}