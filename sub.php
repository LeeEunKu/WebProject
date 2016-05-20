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
  $stu_name = $_REQUEST['stu_name'];
  $year = $_REQUEST['year'];
  $dept = $_REQUEST['dept'];
  $result = $_REQUEST['result'];
  $day = $_REQUEST['day'];

  $sql = "SELECT DISTINCT S.id, S.stu_name, S.year, S.dept, A.result from pro_schedule AS P, attendance AS A, student AS S where  P.cname=A.cname and P.divide=A.divide and P.time=A.time and P.day=A.day";
  $retn = mysqli_query($connect, $sql);

  $ary = array();
  $count = 0;

  while($row = mysqli_fetch_array($retn)){
    array_push($ary, $row[0]);
    $count++;
    echo "$ary[0]<br>";
  }

  echo "<center>
<p style=\"margin-top:20px\">
 <p>
 <font size=6 style=\"margin-left:20px\">sub 출결현황</font> <font style=\"margin-right: 530px\"></font><br><br>

 <table width=\"700\" borderColor=#000000 border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
   <tr>
	 <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">학 번</td>
	 <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">이 름</td>
	 <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">학 년</td>
	 <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">학 과</td>
	 <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">출 결 상 태</td>
   </tr>";
 for($i = 0; $i < $count; $i++){
  echo "<tr>";
  for($j = 0; $j < 5; $j++){
     echo "<td height='40' width='50' bgColor=\"#ffff00\" align=\"center\">$ary[$j]</td>";
   }
   echo "</tr>";
 }
 echo "</table>
</center>";
?>