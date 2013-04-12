<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`courses`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`courses` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $info=$row["info"];
    $title=$row["title"];
    $GUID=$row["GUID"];
}
 $finally.=                       "<li data-theme='a' class='dynamicTag' data-dynamicContent='courseRetriever' style='margin: 1%; overflow: visible; white-space: normal;'>
      			<a href='#studentProfile2'>    
						<div data-role='controlgroup' data-type='horizontal'  class='noteControl'>
                  <h1>$title</h1>
                      <p>$info</p>
                      </div>
                      </a>
                      <input type='text' id='no' style='display:none' value='$GUID'>
                      </li>";
}
echo $finally;
?>
