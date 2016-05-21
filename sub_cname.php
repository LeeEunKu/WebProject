<?php
	$hostname = "localhost";
	$username = "root";
	$password = "autoset";
	$db_name = "capston";

	$connect = mysqli_connect($hostname, $username, $password, $db_name);
	mysqli_set_charset($connect,"utf8");

	if (mysqli_connect_errno($connect)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "SELECT DISTINCT cname, divide from pro_schedule";
	$retn = mysqli_query($connect, $sql);

	$ary_menu = array();
	$ary_menu1 = array();

	while($row = mysqli_fetch_array($retn)){
		array_push($ary_menu, $row[0]);
		array_push($ary_menu1, $row[1]);
	}
?>