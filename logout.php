<?php 
require("process.php");
ob_flush();
session_destroy();
header("Location:index.php");
?>