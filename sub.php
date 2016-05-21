<?php

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

  include "sub_cname.php";

  $hostname = "localhost";
  $username = "root";
  $password = "autoset";
  $db_name = "capston";

  $connect = mysqli_connect($hostname, $username, $password, $db_name);
  mysqli_set_charset($connect,"utf8");

  if (mysqli_connect_errno($connect)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  for($c=0; $c<sizeof($ary_menu); $c++){
  $sql = "SELECT DISTINCT S.id, S.stu_name, S.year, S.dept, A.result, A.date, P.cname FROM (SELECT * FROM pro_schedule WHERE pro_schedule.cname='$ary_menu[$c]' and pro_schedule.divide='$ary_menu1[$c]') AS P, attendance AS A, student AS S WHERE P.cname=A.cname and P.divide=A.divide and S.id=A.id";

  $retn = mysqli_query($connect, $sql);

  $ary_sub = array();
  $count = 0;

  while($row = mysqli_fetch_array($retn)){
    array_push($ary_sub, $row[0], $row[1], $row[2], $row[3], $row[4]);
    $count++;
  }

 for($i = 0; $i < $count; $i++){
  echo "<tr>";
  for($j = 0; $j < 5; $j++){
     echo "<td height='40' width='50' bgColor=\"#ffff00\" align=\"center\">$ary_sub[$j]</td>";
   }
   echo "</tr>";
 }
}
 echo "</table>
</center>";
?>