<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script, called within the course selection page, loads all courses for a given user (UUID) and displays them in
html formatted jquerymobile.
*/
include("initialize.php");
$table="`test`.`users`";
if(isset($_SESSION["UUID"])){
$UUID=$_SESSION["UUID"];
$sql = "SELECT `photo` FROM $table WHERE `UUID`='$UUID'";
}
$result=$db->query($sql);
$finally="";
 $finally.="
<img src=$result height=50 width=50>";
echo $finally;
?>
