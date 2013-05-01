<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script sets a course (GUID) to the current course value key. This is used after a selection of a 
specific course.
*/

session_start();
$_SESSION["GUID"]=$_POST["key"];
?>
