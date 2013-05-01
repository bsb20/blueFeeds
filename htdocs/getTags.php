<?php
/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
Retrieves tages for a particular user.  Looks for all TUID's associated with current UUID, and then retrieves corresponding
tag names
*/
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$SUID=$_SESSION["SUID"];
$sql = "SELECT * FROM $table WHERE `SUID`='$SUID'";
$result=$db->query($sql);
$finally="";
for($i=0; $i<mysqli_num_rows($result); $i++){
    if($row=mysqli_fetch_array($result)){
        $TUID=$row["TUID"];
        $text=$row["text"];
        $toString=$toString."<td type='hidden' style='display:none;'>$TUID</td><td>$text</td>";
    }
}
echo $toString;
?>
