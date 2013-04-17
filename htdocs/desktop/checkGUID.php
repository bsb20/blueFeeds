<?php
	session_start();
	if(!isset($_SESSION['GUID']))
	{
		$_SESSION['alert'] = True;
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/LandingPage.php');
	}
	else
	{
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentSelection.php?GUID' . $_SESSION['GUID']);		
	}
?>