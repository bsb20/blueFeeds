<?php
//Rmoves a student from a course. Does not remove comments.
include("initialize.php");
$table="`test`.`gs`";

$SUID=$_SESSION["tempSUID"];
$GUID=$_SESSION["GUID"];
$db->real_query("DELETE FROM".$table."WHERE `SUID`='$SUID' AND `GUID`='$GUID';");
echo "true";
?>
