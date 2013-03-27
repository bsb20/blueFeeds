<?php
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
echo "isCalled";
$result=$db->query($sql);
$finally="";
if($row=mysqli_fetch_array($result)){
    $text=$row["text"];
    $TUID=$row["TUID"];
    }
    echo"Work";
    $finally.= "<thead>
			<tr>
			<td>&nbsp;</td>	
				<th scope='col'>$text</th>
			</tr>
			</thead>

			<tbody>
			<tr>
							<th scope='row'>$text</th>
							<td>$4080</td>
							<td>$6080</td>
							<td>$6240</td>
							<td>$3520</td>
			</tr>
            </tbody>"
    echo $finally;
?>
