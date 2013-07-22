<?php
include("initialize.php");
$GUID=$_POST["key"];
$UUID=$_SESSION["UUID"];
$sql="DELETE FROM `test`.`groups` WHERE `UUID` = '$UUID' AND `GUID`='$GUID'";
$db->query($sql);
?>