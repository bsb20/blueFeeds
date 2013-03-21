<?php
	session_start();
	$table="`test`.`users`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$UUID=$_SESSION["UUID"];
	$sql = "SELECT * FROM ".$table." WHERE `UUID`='$UUID';";
	$result=$db->query($sql);
	$name;
	$email;
	$title;
	$spec;
	if($row=mysqli_fetch_array($result)){
		$name=$row["user"];
		$email=$row["email"];
		$title=$row["title"];
		$spec=$row["speciality"];
		}
		$_SESSION['profile'] = " <div class='tile-content'>
						<img src='./images/Doctor-house.jpg' class='place-left' id='ProfilePic'/>
						<h2>$name</h2>
						<h5>$title</h5>
						<p>
							$spec
						</p>					
					</div>;"
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Windows Metro Theme/css/modern.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/modern-responsive.css" rel="stylesheet">
    <link href="./Windows Metro Theme/css/site.css" rel="stylesheet" type="text/css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
    <link href="bluefeedsdesktop.css" rel="stylesheet" type="text/css">		

    <script type="text/javascript" src="./javascript/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="./javascript/assets/jquery.mousewheel.min.js"></script>	
	<script type="text/javascript" src="./javascript/accordion.js"></script>
<!--    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">-->

<title>Bluefeeds Test Page</title>

</head>
<header><h1>BlueFeeds Lobby</h1></header>
<body>
    <div class="container">
        <div class="ProfilePage">
				<div class="tile double bg-color-purple" id="ProfileTile">	
					<?php
						echo $_SESSION['profile'];
					?>
				</div>
        </div>
        <div class="BluefeedsNewsLandingPage">
			<h2>Bluefeeds News</h2>
        	<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
				<ul class="accordion dark span10" data-role="accordion">
                    <li>
                        <a href="#">Benedict Departs Vatican</a>
                        <div>
                            <h3>Benedict Departs Vatican, Pledges Obedience to Next Pope</h3>
                            Pope Benedict XVI pledged his "unconditional reverence and obedience" to his successor Thursday, then left the Vatican as the first Roman Catholic Church leader to resign in 600 years.
                            <p>
                                2/28/13, Google News
                            </p>
                        </div>
                    </li>
                    <li>
                        <a href="#">In Victory for Obama, House Backs Domestic Violence Law</a>
                        <div>
                            <h3>In Victory for Obama, House Backs Domestic Violence Law</h3>
                            WASHINGTON - The House voted on Thursday to pass the Senate's bipartisan reauthorization of the Violence Against Women Act, in a big victory for President Obama and Democrats in Congress.
                            <div>
                                2/28/13, Google News
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">Bradley Manning pleads guilty to misusing classified data in WikiLeaks case</a>
                        <div>
                            <h3>Bradley Manning pleads guilty to misusing classified data in WikiLeaks case</h3>
                            Maecenas adipiscing nulla sed sem molestie quis pulvinar lectus convallis. Nam tortor arcu, gravida nec tristique sit amet, pretium sagittis eros. Curabitur at nisi ut ligula ornare euismod.
                            <div>
                                2/28/13, Google News
                            </div>							
                        </div>	
                    </li>
                    <li>
                        <a href="http://www.cnn.com/2013/02/28/showbiz/joan-rivers-holocaust-joke/index.html?hpt=hp_c2">Joan Rivers not apologizing for Holocaust joke</a>
                        <div>
                            <h3>Joan Rivers not apologizing for Holocaust joke</h3>
                            Comedian Joan Rivers isn't about to apologize for a joke she made about the Holocaust.
Rivers, while appearing Monday on "Fashion Police" on E!, talked about the dress model Heidi Klum wore to the Academy Awards
"The last time a German looked this hot was when they were pushing Jews into the ovens," Rivers said.
                            <div>
                                2/28/13, CNN
                            </div>	
                        </div>
                    </li>
					                    <li>
                        <a href="http://lightyears.blogs.cnn.com/2013/02/27/black-holes-rapidly-spinning-and-twisting-spacetime/?hpt=hp_c3">Black holes rapidly spinning and twisting spacetime</a>
                        <div>
                            <h3>Black holes rapidly spinning and twisting spacetime By Elizabeth Landau</h3>
                            Scientists have been able to pin down the most accurate estimate yet for how fast a supermassive black hole is spinning. The answer is "fast": near the speed of light.
The black hole in question is more than 2 million miles across, with a surface traveling near the speed of light. It is at the center of spiral galaxy NGC 1365 and is the equivalent of about 2 million solar masses. Don't worry, this black hole not an imminent danger to us, given that it's in a galaxy 60 million light years away.
Two instruments helped make these measurements: NASA's Nuclear Spectroscopic Telescope Array, or NuSTAR, and the European Space Agency’s XMM-Newton X-ray satellite. Scientists used these tools to detect high-energy X-rays to determine the black hole's spin. Although similar measurements have been attempted before, this is the first time scientists have been able to show that the spin rate can be calculated conclusively.
The findings are described in a new study in the journal Nature.
                            <div>
                                2/27/13, CNN
                            </div>	
                        </div>
                    </li>
                </ul>
				</div>
        </div>
        <div class="MenuPage">
			<ul id="MenuOptions" style="padding-top: 5%">
            	<li><a href="./LandingPage.php"><button class="big" id="MenuButtons">Home<i class="icon-home icon-small"></i></button></a></li>			
            	<li><a href="./Appointments.php"><button class="big" id="MenuButtons">Appointments<i class="icon-clipboard-2 icon-small"></i></button></a></li>
                <li><a href="./StudentSelection.php"><button class="big" id="MenuButtons">Students<i class="icon-user-2 icon-small"></i></button></a></li>
                <li><a href="./RSS Feeds.php"><button class="big" id="MenuButtons">RSS Feeds<i class="icon-feed icon-small"></i></button></a></li>
                <li><a href="./Add Appointment.php"><button class="big" id="MenuButtons">Schedule Appointment<i class="icon-clipboard icon-small"></i></button></a></li>
                <li><a href="./Add Student.php"><button class="big" id="MenuButtons">Add New Students<i class="icon-plus-2 icon-small"></i></button></a></li>               
            </ul>                   
        </div>
        <div class="NextAppointmentPage">         
			<div class="tile double bg-color-orange" style="height:100%; width: 100%; float: left;">
				<div class="tile-content">
					<h2>Today's appointments:</h2>
					<br>
					<p>
						<div style="width:100%;height:100%;line-height:3em;padding:5px;overflow-x: hidden;padding-bottom: 5%;">
							<ul>
								<li id="CurrentAppointments">Lisa Cuddy at 8:30 AM</li>
								<li id="CurrentAppointments">Eric Foreman at 1:00 PM</li>
								<li id="CurrentAppointments">James Wilson at 2:00 PM</li>
								<li id="CurrentAppointments">Dentist at 3:00 PM</li>							
							</ul>							
						</div>
					</p>
				</div>				
			</div>
        </div>
        <div class="MostRecentCommentPage">
<!--         	<head><b>Your most recent comment was made:</b></head>
            <p>2/28/13 3:30 P.M.</p>          
        	<head><b>You said:</b></head>
            <p>A great read. Captivating. I couldn't put it down. I would have given it five stars, but sadly there were too many distracting typos. For example: 46453 13987. Hopefully they will correct them in the next edition.</p>           -->
			<div class="tile double bg-color-green" style="height:100%; width: 100%; float: left;">
				<div class="tile-content">
					<h2>Most Recent Comment:</h2>
					<br>
					<h3>To: </h3>
					<br>
					<p id="RecentCommentText">
						Robert Chase
					</p>
					<h3>Description: </h3>					
					<br>
					<p id="RecentCommentText">
						I hired Chase because his dad made a phone call.
					</p>
				</div>				
			</div>			
        </div>
    </div>​
</body>
</html>

