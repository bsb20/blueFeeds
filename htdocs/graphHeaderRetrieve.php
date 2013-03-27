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

for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $text=$row["text"];
    $TUID=$row["TUID"];
    }
    
    $finally.=      "<td class='dynamicTag' data-dynamicContent='graphHeaderRetrieve'>
      					$20
                                        </td>";
}
echo $finally;
