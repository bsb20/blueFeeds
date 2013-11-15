<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows the user to create and sublmit a tag (TUID) for a specific user (UUID). Parameters include
only a tag name.
*/
include("initialize.php");
$table="`test`.`tags`";
$title=$_POST["title"];
$user=$_SESSION["UUID"];
$TUID=uniqid("", false);
$db->real_query("INSERT INTO ".$table." (`UUID`, `TUID`, `text`) VALUES ('$user', '$TUID','$title');");
echo "true";
?>
