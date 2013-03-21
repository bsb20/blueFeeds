<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		
	
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>
</head>
<header><h1>Schedule Appointments</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">
					<?php 
						echo $_SESSION['profile'];					
					?>		
				</div>
        </div>
        <div class="ScheduleAppointmentPage" class>
			<div style="display: inline-block;">
				<h2>Appointment Information</h2>
				<form action="apptSubmit.php" method="post">
					<div class="input-control text">
						<label for="title">Title: </label>					
						<input type="text" name="title" placeholder="(i.e. Coffee with Joe)"/>
					</div>
					<div class="input-control text">
						<label for="studentname">Student: </label>					
						<input type="text" name="studentname" placeholder="John Smith"/>
					</div>					
					<div class="input-control text">
						<label for="location">Location: </label>					
						<input type="text" name="location" placeholder="(i.e. Office)"/>
					</div>
					<fieldset>					
						<legend>Meeting Date</legend>
						<label for="month">Month</label>
						<select name="month" id="month">
							<option value="jan">Jan</option>
							<option value="feb">Feb</option>
							<option value="mar">Mar</option>
							<option value="apr">Apr</option>
							<option value="may">May</option>
							<option value="jun">Jun</option>
							<option value="jul">Jul</option>
							<option value="aug">Aug</option>
							<option value="sep">Sep</option>
							<option value="oct">Oct</option>
							<option value="nov">Nov</option>
							<option value="dec">Dec</option>
						</select>

						<label for="day">Day</label>
						<select name="day" id="day">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
						<label for="year">Year</label>
						<select name="year" id="year">
							<option value="2013">13</option>
							<option value="2014">14</option>
							<option value="2015">15</option>
							<option value="2016">16</option>
							<option value="2017">17</option>
						</select>
					</fieldset>
					<fieldset>
						<legend>Start Time</legend>
							<select name="sHour" id="sHour">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>

							<select name="sMin" id="sMin">
								<option value="00">00</option>
								<option value="15">15</option>
								<option value="30">30</option>
								<option value="45">45</option>
							</select>

							<select name="sampm" id="sampm">
								<option value="pm">pm</option>
								<option value="am">am</option>
							</select>
					</fieldset>					
					<fieldset>
						<legend>End Time</legend>
							<select name="eHour" id="eHour">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
							<select name="eMin" id="eMin">
								<option value="00">00</option>
								<option value="15">15</option>
								<option value="30">30</option>
								<option value="45">45</option>
							</select>
							<select name="eampm" id="eampm">
								<option value="pm">pm</option>
								<option value="am">am</option>
							</select>
					</fieldset>	
					</br>
					<div>
						<label for="flip-1">Weekly Meeting</label>
							<select name="flip-1" id="flip-1">
								<option value="off">Off</option>
								<option value="on">On</option>
							</select>
					</div>
					<div style="padding-top: 3%" class="input">								
						<label for="submitAppt"></label>
						<input type="submit" name="submitAppt" value="Create Meeting" class="big">	
					</div>
				</form>				
			</div>
        </div>
        <div class="MenuPage">
			<ul id="MenuOptions" style="padding-top: 5%">
            	<li><a href="./Landing Page.html"><button class="big" id="MenuButtons">Home<i class="icon-home icon-small"></i></button></a></li>						
            	<li><a href="./Appointments.html"><button class="big" id="MenuButtons">Appointments<i class="icon-clipboard-2 icon-small"></i></button></a></li>
                <li><a href="./StudentSelection.html"><button class="big" id="MenuButtons">Students<i class="icon-user-2 icon-small"></i></button></a></li>
                <li><a href="./RSS Feeds.html"><button class="big" id="MenuButtons">RSS Feeds<i class="icon-feed icon-small"></i></button></a></li>
                <li><a href="./Add Appointment.html"><button class="big" id="MenuButtons">Schedule Appointment<i class="icon-clipboard icon-small"></i></button></a></li>
                <li><a href="./Add Student.html"><button class="big" id="MenuButtons">Add New Students<i class="icon-plus-2 icon-small"></i></button></a></li>               
            </ul>                   
        </div>
    </div>​
</body>
</html>

