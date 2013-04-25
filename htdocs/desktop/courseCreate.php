<?php
session_start();
$UUID=$_SESSION["UUID"];
$table="`test`.`courses`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$GUID=uniqid("",FALSE);
$info=$_POST["info"];
$title=$_POST["title"];
$sql="INSERT INTO $table (`UUID`,`GUID`, `info`, `title`) VALUES ('$UUID', '$GUID', '$info', '$title');";
$db->real_query($sql);
$table="`test`.`groups`";
$sql="INSERT INTO $table (`UUID`,`GUID`) VALUES ('$UUID', '$GUID');";
$db->real_query($sql);

$table="`test`.`students`";
$newString=$_POST["students"];
$newList=explode(",", $newString);
foreach($newList as $value)
{
	$value = trim($value);
    $sql="SELECT * FROM $table WHERE `user`='$value';";
    $result=$db->query($sql);
    if($row=mysqli_fetch_array($result)){
        $SUID=$row["SUID"];
        $table2="`test`.`gs`";
        $sql="INSERT INTO $table2 (`SUID`,`GUID`) VALUES ('$SUID','$GUID');";
        $db->real_query($sql);
    }
}
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/LandingPage.php');		
echo "true";
?>