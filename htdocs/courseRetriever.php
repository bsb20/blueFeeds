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
 echo "HERE";
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $info=$row["info"];
    $title=$row["title"];
    $GUID=$row["GUID"];
    }
     echo "Repeat";
    $finally.=         
    			"<li>	<h1>$title</h1>
				    <p>$info</p>	
            
            </li>";
    }
}
    echo $finally;
?>
