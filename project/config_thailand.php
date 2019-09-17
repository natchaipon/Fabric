<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "0932398390";
	$dbName = "thailand";
    $objCon1 = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($objCon1,"utf8");
?>