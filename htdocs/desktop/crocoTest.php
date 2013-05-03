<?php
error_reporting(E_ALL);
require_once('crocodoc.php');
$croco = new Crocodoc();
/* $uuid = $croco->upload('http://bluefeeds.cs.duke.edu/home/htdocs/desktop/uploadsPDF/Faculty%20Eval%20Form%20Fall%202012%20Yr.1.pdf');
 */
$uuid = $croco->getStatus('a81968cf-55bd-4133-b961-ceda33f434f2'); 
var_dump($uuid);
?>