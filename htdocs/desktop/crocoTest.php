<?php
require_once('crocodoc.php');
/* $croco = new Crocodoc();
 *//* for a publicly available file */
/* $uuid = $croco->upload('http://bluefeeds.cs.duke.edu/home/htdocs/desktop/uploadsPDF/Faculty%20Eval%20Form%20Fall%202012%20Yr.1.pdf');
var_dump($uuid); */
$url = 'https://crocodoc.com/api/v2/session/create?token=V0dDkJz3i64l87CbSFq2EIXm&uuid=a81968cf-55bd-4133-b961-ceda33f434f2&sidebar=auto'
$data = file_get_contents($url);
var_dump($data);
?>