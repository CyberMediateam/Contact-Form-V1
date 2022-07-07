<?php 
ob_start();
session_start();
require("includes/config.php");
$adminMail = "example@example.com";


if(isset($_SESSION['uspesno'])){ $ok = $_SESSION['uspesno'];
		echo "<div class='succ'><br /><p><center><font color='white'>$ok</font></center></p></div></div>";unset($_SESSION['uspesno']);
     } 
	 else {
		 
	 }
     if(isset($_SESSION['greska'])){$greske = $_SESSION['greska'];
	 echo "<div class='error'><p><center><br /><font color='white'>$greske</font></center></p></div></div>";unset($_SESSION['greska']);
     } else {
		 
	 }
	 

	 function tr($data)
	 {
		 $data = trim($data);
		 return $data;
	 }
	 function slash($data)
	 {
		 $data = addslashes($data);
		 return $data;
	 }
	 
	 if(isset($_GET["page"]) && $_GET["page"] == "send")
	 {
		 $email = htmlspecialchars($db->escape_string(slash(tr($_POST["email"]))));
		 $subject = htmlspecialchars($db->escape_string(slash(tr($_POST["subject"]))));
		 $message = htmlspecialchars($db->escape_string(slash(tr($_POST["message"]))));
		 $securitykey = htmlspecialchars($db->escape_string(slash(tr($_POST["security"]))));
		  $security2 = $_POST["security2"];
		  $security2 = htmlspecialchars($db->escape_string($_POST["security2"]));
		 if($email == "" or $subject == "" or $message == "" or $securitykey == "")
		 {
			 header("Location:index.php");
			 $_SESSION["greska"] == "Sva polja su obavezna!";
			 exit;
		 }
		 if($securitykey !== "$security2")
		 {
			 $_SESSION["greska"] == "Brojeve koje ste uneli se ne poklapaju!";
			 header("Location:index.php");
			 $_SESSION["greska"] == "Brojeve koje ste uneli se ne poklapaju!";
			 
			 return;
		 }
		 
		 $ip = $_SERVER["REMOTE_ADDR"];
		// funkcije za slanje mail i sacuvanje u bazu treba da se doda!
		
		$date = date("d.M.Y");
		$poruka = "
		Client $email, has contacted you. The details of message is:
		$message,
		Client IP: $ip
		Date: $date";
		$from = "$email";
	
		
		mail($adminMail,$subject,$poruka,$from);
		$result = $db->query("INSERT INTO `messages` (`Client Email`, `Subject`, `Message`, `Date`, `Client IP`) VALUES ('$email','$subject','$message','$date','$ip')");
		if(!$result)
		{
			$_SESSION["greska"] = "Dogodila se greška prilikom saćuvanje u baze!";
			die("Mysqli:" . $db->error);
			exit;
	 }
	 header("Location:index.php");
	 $_SESSION["uspesno"] = "Uspesno ste kontaktirali administraciju. Uskoro cete dobiti odgovor na vase pitanje";
	 }
	 
	 
	 if($_GET["task"] == "login")
	 {
		 $username = htmlspecialchars($db->escape_string(slash(tr($_POST["username"]))));
		 $password = htmlspecialchars($db->escape_string(tr($_POST["password"])));
		 $password = md5($password);
		 
		 
			 
		 
			 $result = $db->query("SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'");
			 if($result->num_rows < 1) {
				 header("Location:najava.php");
				 $_SESSION["greska"] = "Netacno korisnicko ime ili lozinka!";
				 $date = date("d.m.Y");
				 $ip = $_SERVER["REMOTE_ADDR"];
				 $db->query("INSERT INTO `logovi`(`IP`,`Detalje`, `datum`) VALUES ('$ip', 'Neuspesni pokusaj da se uloguje na panelu', '$date')");
			 } else {
				 
				 $user = $result->fetch_array();
				 
				 $_SESSION["id"] = $user["id"];
				 $mesec = 24*60*60*31;
				 $time = time();
				 $sesija = md5($user['username'] . $password);
				 setcookie("id", $_SESSION["id"], time() + $mesec);
		         setcookie("username", $_SESSION["username"], time() + $mesec);
		         setcookie("sesija", $sesija, time()+$mesec);

				 header("Location:admin.php");
				 $userr = $user["username"];
				 $_SESSION["uspesno"] = "Uspesno ste se ulogovali $userr";
				 
			 }
		 
		 
	 }
	 
	 if($_GET["akcija"] == "odgovor") {
		 $email = $_POST["email"];
		 $naslov = $_POST["naslov"];
		 $poruka = $_POST["poruka"];
		 
		 $email = htmlspecialchars($db->escape_string(slash(tr($_POST["email"]))));
		 $naslov = htmlspecialchars($db->escape_string(slash(tr($_POST["naslov"]))));
		 $poruka = htmlspecialchars($db->escape_string(slash(tr($_POST["poruka"]))));
		 $idporuka = htmlspecialchars($db->escape_string(slash(tr($_POST["idporuka"]))));
		 
		 if($email == "" or $naslov == "" or $poruka == "")
		 {
			 header("Location:admin.php");
			 $_SESSION["greska"] = "Sva polja su obavezna!";
			 exit;
		 }
		 else {
			 mail($email, $naslov, $poruka, $adminMail);
			 $db->query("DELETE FROM `messages` WHERE `id`='$idporuka'");
			 header("Location:index.php");
			 $_SESSION["uspesno"] = "Odgovorili ste uspesno klijentu.";
		 }
	 }
	 
