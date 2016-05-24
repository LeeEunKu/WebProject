<?php

  $cname = $_REQUEST['cname'];
  $divide = $_REQUEST['divide'];

echo "<p style=\"margin-top:20px\">
 <p>";
 echo "<font size=6 style=\"margin-left:185px\">$cname $divide"."분반 출결현황</font><br>";
echo "<center>
 <table width=\"700\" borderColor=#000000 border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
   <tr>
   <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">학 번</td>
   <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">이 름</td>
   <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">학 년</td>
   <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">학 과</td>
   <td height='40' width='115' bgColor=\"#ffff00\" align=\"center\">출 결 상 태</td>
   </tr>";

  $hostname = "localhost";
  $username = "root";
  $password = "autoset";
  $db_name = "capston";

  $connect = mysqli_connect($hostname, $username, $password, $db_name);
  mysqli_set_charset($connect,"utf8");

  if (mysqli_connect_errno($connect)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "SELECT DISTINCT S.id, S.stu_name, S.year, S.dept, A.result FROM (SELECT * FROM pro_schedule WHERE pro_schedule.cname='$cname' and pro_schedule.divide='$divide') AS P, attendance AS A, student AS S WHERE P.cname=A.cname and P.divide=A.divide and S.id=A.id order by result desc";

  $retn = mysqli_query($connect, $sql);

  $ary_sub = array();
  $res = array();
  $k = 0;
  $count = 0;

  while($row = mysqli_fetch_array($retn)){
    if($row[4]==0){
     $row[4] = '결석';
    }
    else if($row[4]==1){
      $row[4] = '지각';
    }
    else if($row[4]==2){
      $row[4] = '출석';
    }
    else{
      $row[4] = '임시출석';
    }
    array_push($ary_sub, $row[0], $row[1], $row[2], $row[3], $row[4]);
    $count++;
  }

 for($i = 0; $i < $count; $i++){
  echo "<tr>";
  for($j = 0; $j < 5; $j++){
     echo "<td height='40' width='50' bgColor=\"#ffff00\" align=\"center\">$ary_sub[$k]</td>";
     $k++;
   }
   echo "</tr>";
 }
 echo "</table>
</center>";
?>