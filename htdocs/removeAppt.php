<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script deletes an appointment (AUID) from the database.
*/

include("initialize.php");
$table="`test`.`appointments`";
$AUID=$_SESSION["AUID"];
$sql="DELETE FROM $table WHERE `AUID`='$AUID';";
$db->real_query($sql);
echo "true";
?>
