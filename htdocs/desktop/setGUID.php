<?php
/* Sets the GUID based on the course button clicked */
/* Turns off alarm on the main landing page */
session_start();
$_SESSION['GUID'] = $_GET['course'];
$_SESSION['alert'] = FALSE;
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/LandingPage.php');
?>