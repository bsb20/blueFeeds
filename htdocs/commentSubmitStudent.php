<?php

/*
Authors: Brett Cadigan
This php script submits comments for a given user (UUID) and student (SUID) to our online database for retrieval later.
As parameters it taked the comments text, comments tags, and the student and user information.
*/

echo "HEY";
include("initialize.php");
include("mailer.php");
$table="`test`.`comments`";
$tag_table="`test`.`tu`";
$text=$_POST["comment"];
$title=$_POST["title"];
$instructors=$_POST["instructors"];
$students=true;
//$user="5292dd8f570ab"//as soon as two of these lines is uncommented, the whole thing falls apart
//$user=$_SESSION["UUID"];
//$GUID="529651b82a752"///PROBLEM LINE
//$GUID=$_SESSION["GUID"];
//$student="5296520e5f276"//Problem
//$student=$_SESSION["SUID"];
//$CUID="231341a14d4"/problem
$newTag=$_POST["new"];
$tags=$_POST["tag"];
/*
$mailSql="SELECT `email` FROM `test`.`students` WHERE `SUID`='$student'";
$mailResult=$db->query($mailSql);
if($mailRow=mysqli_fetch_array($mailResult)){
	$mailAddress=$mailRow["email"];
}
$mailContent="Hello! Your have received a new comment on BlueFeeds.

 ".$title.":
".$text."

Please check your BlueFeeds account at http://198.61.175.216/bluefeeds/htdocs/blueFeeds.html for more details.";
mailer($mailAddress,$mailContent);

if(!isset($tags)){
$tags=array();
}
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
echo "true";*/
?>
