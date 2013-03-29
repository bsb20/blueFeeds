<?php
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM $table WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$finally="";
foreach($result as $row){
        $TUID=$row["TUID"];
        $text=$row["text"];
        $toString=$toString."
        <ls>
        <fieldset><input type='checkbox' name='tag[]' id='$TUID' value='$TUID' class='custom' /><label for='$TUID'>$text</label></fieldset>
        </ls>";
}
echo $toString;
?>
