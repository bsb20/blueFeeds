<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows a user to create a new course for user (UUID) with a title and short
descripton within the database table. 
*/
include("initialize.php");
$UUID=$_SESSION["UUID"];
$table="`test`.`courses`";
$GUID=uniqid("",FALSE);
$info=$_POST["info"];
$title=$_POST["title"];
$sql="INSERT INTO $table (`UUID`,`GUID`, `info`, `title`) VALUES ('$UUID', '$GUID', '$info', '$title');";
$db->real_query($sql);
$table="`test`.`groups`";
$sql="INSERT INTO $table (`UUID`,`GUID`) VALUES ('$UUID', '$GUID');";
$db->real_query($sql);
echo "true";
?>
