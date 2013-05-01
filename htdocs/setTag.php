<?php
/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
Sets the TUID for the selected tag
*/
session_start();
$_SESSION["TUID"]=$_POST["key"];
?>
