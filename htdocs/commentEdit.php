<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script allows a user (UUID) to update the text (note) of a comment for a given student (SUID) in the database.
*/
include("initialize.php");
$table="`test`.`comments`";
$text=$_POST["comment"];
$students=$_POST["students"];
//ability to modify instructors visibility commented out
//$instructors=$_POST["instructors"];
//$instructors=1;
$CUID=$_POST["CUID"];
$db->real_query("UPDATE ".$table." SET `text`='$text', `students`='$students' WHERE `CUID`='$CUID';");
echo "true";
//$db->real_query("UPDATE ".$table." SET `text`='$text', `instructors`='$instructors', `students`='$students' WHERE `CUID`='$CUID';");
?>
