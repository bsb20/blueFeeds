<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This page is used to add a student to a course.
*/
include("initialize.php");
$SUID=$_SESSION["SUID"];
$GUID=$_POST["guid"];
$table="`test`.`gs`";
$sql="INSERT INTO $table (`SUID`,`GUID`) VALUES ('$SUID','$GUID');";
$db->real_query($sql);
echo "true";
?>
