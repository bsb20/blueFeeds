<?php
	session_start();
	if(!isset($_SESSION['GUID']))
	{
		// Turn on the dialog to prompt user to select a course
		$_SESSION['alert'] = TRUE;	
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/LandingPage.php');
	}
	else
	{
		header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentSelection.php');		
	}
?>