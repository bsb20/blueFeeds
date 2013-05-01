<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script deletes the selected comment of a user (UUID) for a given student (SUID) from the database.
*/


session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$text=$_POST["comment"];
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$CUID=$_POST["CUID"];
$isReleased=0;
$date=date("Y-m-d H:i:s");
$db->real_query("DELETE FROM".$table."WHERE `CUID`='$CUID';");
echo "true";
?>
