<?php
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$tag=$_POST["tag"];
$TUID=uniqid("",FALSE);
$db->real_query("INSERT INTO ".$table." (`tag`, `TUID`) VALUES ('$tag', '$TUID');");
?>