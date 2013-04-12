<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`courses`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
if(isset($_SESSION["UUID"])){
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`courses` WHERE `UUID`='$UUID'";
$link="#studentSelection";
}
else{
$SUID=$_SESSION["SUID"];
$sql="SELECT * FROM `test`.`gs`, `test`.`courses` WHERE `test`.`gs`.`SUID`='$SUID' AND `test`.`courses`.`GUID`=`test`.`gs`.`GUID`;";
$link="#studentCourse";
}
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $info=$row["info"];
    $title=$row["title"];
    $GUID=$row["GUID"];
}
 $finally.=                       "<li data-theme='c' class='dynamicTag' data-dynamicContent='courseRetriever' style='margin: 1%; overflow: visible; white-space: normal;'>
      			<a href='$link'>    
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl'>
                  <h1>$title</h1>
                      <p>$info</p>
                      </div>
                      </a>
                      <input type='text' class='courseKey' style='display:none' value='$GUID'>
                      </li>";
}
echo $finally;
?>
