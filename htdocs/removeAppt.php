<?php
session_start();
$table="`test`.`appointments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$AUID=$_SESSION["AUID"];
$sql="DELETE FROM $table WHERE `AUID`='$AUID';";
$db->real_query($sql);
echo "true";
?>