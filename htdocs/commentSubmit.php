<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script submits comments for a given user (UUID) and student (SUID) to our online database for retrieval later.
As parameters it taked the comments text, comments tags, and the student and user information.
*/

session_start();
date_default_timezone_set("America/New_York");
$table="`test`.`comments`";
$tag_table="`test`.`tu`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$text=$_POST["comment"];
$title=$_POST["title"];
$instructors=$_POST["instructors"];
$students=$_POST["students"];
$user=$_SESSION["UUID"];
$GUID=$_SESSION["GUID"];
$student=$_SESSION["SUID"];
$CUID=$_POST["CUID"];
$newTag=$_POST["new"];
$tags=$_POST["tag"];
if(strlen(trim($newTag)) !=0){
	$newTUID=uniqid("",FALSE);
	array_push($tags,$newTUID);
	$db->real_query("INSERT INTO `test`.`tags` (`text`, `TUID`, `UUID`) VALUES ('$newTag', '$newTUID', '$user');");
}
$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `SUID`, `date`, `text`, `CUID`, `title`, `instructors`, `students`, `GUID`) VALUES ('$user', '$student', '$date', '$text', '$CUID','$title', '$instructors','$students', '$GUID');");
foreach ($tags as $TUID){
	$db->real_query("INSERT INTO ".$tag_table." (`TUID`, `CUID`) VALUES ('$TUID', '$CUID');");
}
echo "true";
?>
