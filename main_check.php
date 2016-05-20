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

	$id = $_REQUEST['id'];
	$pw = $_REQUEST['pw'];

	$sql = "SELECT id,pw from professor where id='$id' && pw='$pw'";
	$retn = mysqli_query($connect, $sql);

	
	if($row = mysqli_fetch_array($retn))
	{
		echo "<script>document.location.href='professor_main.html';</script>";
	}
	else {
		echo ("<script>alert('사번 또는 비밀번호가 잘못되었습니다.\\n\\n다시 확인하시고 이용해주세요.\\n\\n사번 : 5자리, 비밀번호 : 4~15자리');location.href='professor_login.html';</script>");
	}

?>