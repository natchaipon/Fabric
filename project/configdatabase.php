<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "0932398390";
	$dbName = "member";
	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($objCon,"utf8");
?>