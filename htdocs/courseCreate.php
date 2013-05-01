<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows a user to create a new course for user (UUID) with a title and short
descripton within the database table. 
*/

session_start();
$UUID=$_SESSION["UUID"];
$table="`test`.`courses`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
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
