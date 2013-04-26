<?php

/*
This php script updates the Comment ID (CUID) value. It is called from a jquery function after a comment is selected.
*/

    $CUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='CUID' id='CUID' value='$CUID'>";
    echo $line;
?>

