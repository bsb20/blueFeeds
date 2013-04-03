<?php
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
$tags=$_POST["tag"];
$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `SUID`, `date`, `text`, `CUID`, `title`, `instructors`, `students`, `GUID`) VALUES ('$user', '$student', '$date', '$text', '$CUID','$title', '$instructors','$students', '$GUID');");
foreach ($tags as $TUID){
	$db->real_query("INSERT INTO ".$tag_table." (`TUID`, `CUID`) VALUES ('$TUID', '$CUID');");
}
echo "true";
?>
