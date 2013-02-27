<?php
    $CUID=uniqid("",FALSE);
    $line="";
    $line.="<input type='hidden' name='commentID' value='$CUID'>";
    echo $line;
?>

