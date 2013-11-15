<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows the user to create a new tag (TUID) and adds it to the database. 
*/
include("initialize.php");
$table="`test`.`tags`";
$UUID=$_SESSION["UUID"];
$tag=$_POST["tag"];
$TUID=uniqid("",FALSE);
$db->real_query("INSERT INTO ".$table." (`tag`, `TUID`, `UUID`) VALUES ('$tag', '$TUID', '$UUID');");
?>
