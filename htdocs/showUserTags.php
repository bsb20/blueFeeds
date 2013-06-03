<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script loads all viable comment tags for a specific user (UUID).
*/
include("initialize.php");
$table="`test`.`tags`";
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM $table WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$toString="<fieldset data-role='controlgroup' class='tagBox' data-dynamicContent='showUserTags'>";
foreach($result as $row){
        $TUID=$row["TUID"];
        $text=$row["text"];
        $toString=$toString."<input type='checkbox' name='tag[]' id='$TUID' value='$TUID'/><label for='$TUID'>$text</label>";
}
echo $toString."</fieldset>";
?>
