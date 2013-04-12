<?php
session_start();
$_SESSION['GUID'] = $_GET['course'];
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/LandingPage.php');
?>