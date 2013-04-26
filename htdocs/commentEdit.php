<?php

/*
This php script allows a user (UUID) to update the text (note) of a comment for a given student (SUID) in the database.
*/

session_start();
$table="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$text=$_POST["comment"];
$students=$_POST["students"];
$instructors=$_POST["instructors"];
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$CUID=$_POST["CUID"];
$date=date("Y-m-d H:i:s");
$db->real_query("UPDATE ".$table." SET `text`='$text', `instructors`='$instructors', `students`='$students' WHERE `CUID`='$CUID';");
echo "true";
?>
