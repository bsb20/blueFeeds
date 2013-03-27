<?php
session_start();
echo "DOG";
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
$i=500;
$finally.=      "<th scope='row' class='dynamicTag' data-dynamicContent='graphHeaderRetrieve'>'Leadership'</th>
                        <td>$i</td>";
echo $finally;
