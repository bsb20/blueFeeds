<?php
include("initialize.php");
$sUUID=$_SESSION["UUID"];
$sSUID=$_SESSION["SUID"];
$sGUID=$_SESSION["GUID"];
$sCUID=$_SESSION["CUID"];

$values;

$values=    "<li style='display:none' data-theme='c' class='dynamicTag' data-icon='arrow-r' data-dynamicContent='sessionValues' style='margin:1%; white-space:normal;'>
                      <input type='text' id='sUUID' style='display:none' name='sUUID' value='$sUUID'>
                      <input type='text' id='sSUID' style='display:none' name='sSUID' value='$sSUID'>
                      <input type='text' id='sGUID' style='display:none' name='sGUID' value='$sGUID'>
                      <input type='text' id='sCUID' style='display:none' name='sCUID' value='$sCUID'>
	</li>";

echo $values;

?>
