<?php
session_start();
$table="`test`.`comments`";
$tag_table="`test`.`tu`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$text=$_POST["comment"];
$title=$_POST["title"];
$user=$_SESSION["UUID"];
$student=$_SESSION["SUID"];
$isReleased=0;
$CUID=$_POST["CUID"];
$tags=$_POST["tag"];
$date=date("Y-m-d H:i:s");
$db->real_query("INSERT INTO ".$table." (`UUID`, `SUID`, `date`, `text`, `isReleased`, `CUID`, `title`) VALUES ('$user', '$student', '$date', '$text', '$isReleased', '$CUID','$title');");
foreach ($tags as $TUID){
	$db->real_query("INSERT INTO ".$tag_table." (`TUID`, `CUID`) VALUES ('$TUID', '$CUID');");
}
echo "true";
?>
