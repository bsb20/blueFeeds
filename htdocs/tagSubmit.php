<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows the user to create and sublmit a tag (TUID) for a specific user (UUID). Parameters include
only a tag name.
*/

session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$title=$_POST["title"];
$user=$_SESSION["UUID"];
$TUID=uniqid("", false);
$db->real_query("INSERT INTO ".$table." (`UUID`, `TUID`, `text`) VALUES ('$user', '$TUID','$title');");
echo "true";
?>
