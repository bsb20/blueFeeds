<?php
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID' AND WHERE `SUID`='$SUID'";
$result=$db->query($sql);
$finally="<tr>
    		  <td>&nbsp;</td>";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $text=$row["text"];
    $TUID=$row["TUID"];
    }
    $finally.= "<th scope="col" data-theme='a' class='dynamicTag' data-dynamicContent='tagRetrieve' style='margin: 1%; overflow: visible; white-space: normal;'>$text</th>";
}
    echo $finally;
    echo "</tr>";
?>
