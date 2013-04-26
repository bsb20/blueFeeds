<?php

/*
This php script submits appointments for a given user (UUID) and student (SUID) to our online database for retrieval later.
As parameters it taked the appointment start and end times, location, title, and the student and user information.
*/

session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`appointments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$sHour=$_POST["sHour"];
$sMin=$_POST["sMin"];
$sampm=$_POST["sampm"];
$eHour=$_POST["eHour"];
$eMin=$_POST["eMin"];
$eampm=$_POST["eampm"];
$sDate="$day $month $year $sHour:$sMin:00 $sampm";
$eDate="$day $month $year $eHour:$eMin $eampm";
$sDateTime=date("Y-m-d H:i:s",strtotime($sDate));
$eDateTime=date("Y-m-d H:i:s",strtotime($eDate));
$location=$_POST["location"];
$title=$_POST["title"];
$AUID=uniqid("",FALSE);
$_SESSION['AUID']=$AUID;
$db->real_query("INSERT INTO ".$table." (`UUID`, `SUID`, `start`, `end`, `title`, `location`, `AUID`) VALUES ('$user', '$student', '$sDateTime', '$eDateTime', '$title', '$location', '$AUID');");
echo "true";
?>
