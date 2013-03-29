<?php
    $FUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='FUID' id='FUID' value='$FUID'>";
    echo $line;
?>
