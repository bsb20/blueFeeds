<?php
session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`courses`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`courses`";
$result=$db->query($sql);
 echo "HERE";
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $Info=$row["Info"];
    $title=$row["title"];
    $GUID=$row["GUID"];
    }
     echo "Repeat";
    $finally.=                       "<li data-theme='c' class='listNote dynamicComment' data-dynamicContent='courseRetriever' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
        		<h1>$title</h1>
				    <p>$Info</p>	
            
            </li>";
    }
}
    echo $finally;
?>
