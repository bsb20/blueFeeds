<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script, called within the course selection page, loads all courses for a given user (UUID) and displays them in
html formatted jquerymobile.
*/
include("initialize.php");
$table="`test`.`courses`";
if(isset($_SESSION["UUID"])){
$UUID=$_SESSION["UUID"];
$sql = "SELECT DISTINCT * FROM `test`.`courses`, `test`.`groups` WHERE `test`.`groups`.`UUID`='$UUID' AND `test`.`courses`.`GUID`=`test`.`groups`.`GUID`";
$link="#studentSelection";
}
else{
$SUID=$_SESSION["SUID"];
$sql="SELECT DISTINCT * FROM `test`.`gs`, `test`.`courses` WHERE `test`.`gs`.`SUID`='$SUID' AND `test`.`courses`.`GUID`=`test`.`gs`.`GUID`;";
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
 $finally.=                       "<li data-theme='c' class='dynamicTag' data-icon='arrow-r' data-dynamicContent='courseRetriever' style='margin:1%; white-space:normal;'>
      			<a href='$link'>    
		    	<div data-role='controlgroup' data-type='horizontal'  class='noteControl'>
                  <h1>$title</h1>
                      <p style='white-space:normal;'>$info</p>
                      <input type='text' class='courseKey' style='display:none' name='key' value='$GUID'>
                      </div>
                      </a>
                      </li>";
}
echo $finally;
?>
