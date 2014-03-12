<?php
include("initialize.php");

$TUID=$_SESSION["TUID"];
$sql="DELETE FROM `test`.`tags` WHERE `TUID`='$TUID' LIMIT 1;";
$result=$db->real_query($sql);
echo 'true';
//echo "TUID: ".$TUID." SQL: :".$sql;
?>
