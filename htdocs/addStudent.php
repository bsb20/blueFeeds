<?php
session_start();
$table="`test`.`students`";
$GUID=$_SESSION["GUID"];
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$newString=$_POST["students"];
$newList=explode(",", $newString);
foreach($newList as $value){
    $sql="SELECT * FROM $table WHERE `id`='$value';";
    $result=$db->query($sql);
    if($row=mysqli_fetch_array($result)){
        $SUID=$row["SUID"];
        $table="`test`.`gs`";
        $sql="INSERT INTO $table (`SUID`,`GUID`) VALUES ('$SUID','$GUID');";
        $db->real_query($sql);
    }
}
echo "true";
?>