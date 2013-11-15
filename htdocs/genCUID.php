<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script genereates a new Comment ID (CUID) value.
*/

    $CUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='CUID' id='CUID' value='$CUID'>";
    echo $line;
?>

