<?php
    
/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script genereates a new (FUID) value.
*/

    $FUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='FUID' id='FUID' value='$FUID'>";
    echo $line;
?>
