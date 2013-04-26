<?php

/*
This php script genereates a new Tag ID (TUID) value.
*/

    $TUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='TUID' id='TUID' value='$TUID'>";
    echo $line;
?>
