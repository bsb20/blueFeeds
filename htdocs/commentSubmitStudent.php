<?php

/*
Authors: Brett Cadigan
This php script submits comments for a given user (UUID) and student (SUID) to our online database for retrieval later.
As parameters it taked the comments text, comments tags, and the student and user information.
*/

include("initialize.php");
include("mailer.php");
$table="`test`.`comments`";
$tag_table="`test`.`tu`";
$text=$_POST["comment"];
$title=$_POST["title"];
$instructors=$_POST["instructors"];
$students=true;
$user=$_SESSION["tempUUID"];
$GUID=$_SESSION["GUID"];
$student=$_SESSION["SUID"];
//$CUID=$_POST["CUID"];
$CUID=uniqid("",false);
$newTag=$_POST["new"];
$tags=$_POST["tag"];

if($instructors){
	$coSql="SELECT `email` FROM `users` INNER JOIN `groups` ON `users`.UUID=`groups`.UUID where `GUID`='$GUID';";
	$coResult=$db->query($coSql);
	while($coRow=mysqli_fetch_array($coResult)){
		$coAddress.=$coRow["email"].", ";
	}
}

$mailSql="SELECT `email` FROM `test`.`users` WHERE `UUID`='$user'";
$mailResult=$db->query($mailSql);
if($mailRow=mysqli_fetch_array($mailResult)){
	$mailAddress=$mailRow["email"];
}
$mailContent="Hello! Your have received a new student reply on BlueFeeds.

 ".$title.":
".$text."

Please check your BlueFeeds account at http://www.dukebluefeeds.com/ for more details.";
mailer($mailAddress,$mailContent,$coAddress);

$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `SUID`, `date`, `text`, `CUID`, `title`, `instructors`, `students`, `GUID`) VALUES ('$user', '$student', '$date', '$text', '$CUID','$title', '$instructors','$students', '$GUID');");
foreach ($tags as $TUID){
	$db->real_query("INSERT INTO ".$tag_table." (`TUID`, `CUID`) VALUES ('$TUID', '$CUID');");
}
echo "true";
?>
