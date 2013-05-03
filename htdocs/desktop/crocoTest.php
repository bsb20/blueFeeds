<?php
require_once('crocodoc.php');
$croco = new Crocodoc();
/* for a publicly available file */
$uuid = $croco->upload('http://bluefeeds.cs.duke.edu/home/htdocs/desktop/uploadsPDF/Faculty%20Eval%20Form%20Fall%202012%20Yr.1.pdf');
echo $uuid;
?>