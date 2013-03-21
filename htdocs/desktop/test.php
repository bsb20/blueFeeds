<?php
session_start();
date_default_timezone_set("America/New_York");
$table2="`test`.`appointments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_GET["UUID"];
$final="";
$sql2 = "SELECT * FROM ".$table2." WHERE `SUID`='$SUID' ORDER BY `start`;";
$result2=$db->query($sql2);
if($row=mysqli_fetch_array($result1) and $row['isWeekly']==1){

	$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);	
	$start=strtotime($row['start']);
	$formattedStart=date("g:i",$start);	
	
	$_SESSION["nextApptDate"]=$weekly;		
	$_SESSION["nextApptTime"]=$formattedStart;	
}
$_SESSION['appointments'] = $table;
?>