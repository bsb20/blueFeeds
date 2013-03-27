<?php
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
if($row=mysqli_fetch_array($result)){
    $text=$row["text"];
    $TUID=$row["TUID"];
    }
    $finally.= ""
    echo $finally;
?>
