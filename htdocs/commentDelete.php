<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script deletes the selected comment of a user (UUID) for a given student (SUID) from the database.
*/

include("initialize.php");
$table="`test`.`comments`";
$CUID=$_POST["CUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("DELETE FROM".$table."WHERE `CUID`='$CUID';");
echo "true";
?>
