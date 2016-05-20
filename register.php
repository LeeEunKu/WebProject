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
	$pro_name = $_REQUEST['pro_name'];

	$sql = "SELECT id from professor where id='$id'";
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