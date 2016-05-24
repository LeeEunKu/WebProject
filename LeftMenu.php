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
	echo "<!DOCTYPE html>
		<html>
		<head>
			<meta charset=\"euc_kr\">
			<title>List</title>
			<style judy_type(array)=\"text/css\">
				#btnBg li {display: block;}
				#btnBg li button {border: 0px; background: #0066ac; width: 270px; height: 35px; margin-top: 3px;}
				#btnBg li button:hover {background: #0098de;}
				.btnText{text-align: center; color: #FFFFFF; font-size: 15px;}
			</style>
		</head>
		<body>
		<p style=\"margin-top:100px\">
			<ul id=\"btnBg\">";
	for($i = 0; $i < sizeof($ary_menu); $i++)
		echo "<li><button type=\"button\" class=\"btnText\" onclick=\"top.frames[2].location.href='sub.php?cname=$ary_menu[$i]&divide=$ary_menu1[$i]'\">$ary_menu[$i] $ary_menu1[$i]분반</button></li>";
	echo "<li><button type=\"button\" class=\"btnText\" onclick=\"top.frames[2].location.href='pfTimetable.html'\">시간표</button></li>
			</ul>
		</body>
		</html>";
?>

		