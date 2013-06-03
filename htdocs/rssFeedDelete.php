<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script removes an desktop updated rssfeed from the live rss feed page and correspondind database location.
*/
include("initialize.php");
$table="`test`.`feeds`";

$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$FUID=$_POST["FUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("DELETE FROM".$table."WHERE `FUID`='$FUID';");
echo "true";
?>
