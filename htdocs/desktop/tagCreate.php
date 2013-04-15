<?php
session_start();
$table="`test`.`tags`";
$UUID=$_SESSION["UUID"];
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$tag=$_POST["tag"];
$TUID=uniqid("",FALSE);
$db->real_query("INSERT INTO ".$table." (`tag`, `TUID`, `UUID`) VALUES ('$tag', '$TUID', '$UUID');");
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/Add Student.php');
?>