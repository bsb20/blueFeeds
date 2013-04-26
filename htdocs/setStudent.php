<?php

/*
This php script sets a student (SUID) to the current student value key. This is used after a selection of a 
specific student before advancing to the student profile page.
*/

session_start();
$_SESSION["SUID"]=$_POST["key"];
?>
