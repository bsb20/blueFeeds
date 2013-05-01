<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script sets a appointment to the current appointment value key. This is used after a selection of a 
specific appointment.
*/

session_start();
$_SESSION["AUID"]=$_POST["key"];
?>
