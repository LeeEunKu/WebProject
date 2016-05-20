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

	$cname = $_REQUEST['cname'];

	$sql = "SELECT cname, divide from pro_schedule;
	$retn = mysqli_query($connect, $sql);

	$row = mysqli_fetch_array($retn);
	if($row[0] != "" && $row[0] == $id)
	{
		echo ("<script>alert('이미 사용중인 사번입니다.\\n\\n다시 확인하시고 이용해주세요.');location.href='professor_register.html';</script>");
	}
	else {
		$sql1 = "INSERT INTO professor (id, pw, pro_name) VALUES ('$id', '$pw', '$pro_name')";
		$retn1 = mysqli_query($connect, $sql1);

		if(isset($retn1)){
			echo ("<script>alert('회원가입이 완료되었습니다.\\n\\n로그인 후 정상적으로 이용 가능합니다.');location.href='professor_login.html';</script>");
		}
		else{
			echo "fail";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="euc_kr">
	<title>List</title>
	<style type="text/css">
		#btnBg li {display: block;}
		#btnBg li button {border: 0px; background: #0066ac; width: 270px; height: 35px; margin-top: 3px;}
		#btnBg li button:hover {background: #0098de;}
		.btnText{text-align: center; color: #FFFFFF; font-size: 15px;}
	</style>
</head>
<body>
<p style="margin-top:100px">
	<ul id="btnBg">
		<li><button type="button" class="btnText" onclick="top.frames[2].location.href='sub1.html'">sub1</button></li>
		<li><button type="button" class="btnText" onclick="top.frames[2].location.href='sub2.html'">sub2</button></li>
		<li><button type="button" class="btnText" onclick="top.frames[2].location.href='sub3.html'">sub3</button></li>
		<li><button type="button" class="btnText" onclick="top.frames[2].location.href='sub4.html'">sub4</button></li>
		<li><button type="button" class="btnText" onclick="top.frames[2].location.href='pfTimetable.html'">시간표</button></li>
	</ul>
</body>
</html>