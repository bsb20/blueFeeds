<?php
session_start();
$table="`test`.`users`";
$GUID=$_SESSION["GUID"];
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$newString=$_POST["instructors"];
$newList=explode(",", $newString);
foreach($newList as $value){
    $sql="SELECT * FROM $table WHERE `user`='$value';";
    $result=$db->query($sql);
    if($row=mysqli_fetch_array($result)){
        $UUID=$row["UUID"];
        $table="`test`.`groups`";
        $sql="INSERT INTO $table (`UUID`,`GUID`) VALUES ('$UUID','$GUID');";
        $db->real_query($sql);
    }
}
echo "true";
?>