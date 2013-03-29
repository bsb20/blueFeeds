<?php
    $TUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='TUID' id='TUID' value='$TUID'>";
    echo $line;
?>
