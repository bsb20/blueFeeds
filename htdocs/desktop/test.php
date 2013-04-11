<?php
	session_start();
	date_default_timezone_set("America/New_York");
	$table="`test`.`students`";
	$table2="`test`.`appointments`";
	$db=new mysqli("127.0.0.1","root","devils","test",8889);
	if($db->connect_errno){
		echo "FAILURE";
	}
	$UUID=$_SESSION["UUID"];
	$final="";
	$sql = "SELECT * FROM $table,$table2 WHERE $table.`SUID`=$table2.`SUID` AND $table2.`UUID`='$UUID' ORDER BY `start`;";
	$result=$db->query($sql);
	$table = "						<thead>
								<tr>
									<th>Name</th>
									<th class='right'>Title</th>
									<th class='right'>Location</th>
									<th class='right'>Time and Date</th>
								</tr>
							</thead>
							<tbody>";
	
	$numAppt = 0;
	$timeframe = "week";
	/* Filtering */
	for($i=0; $i<mysqli_num_rows($result); $i++){
		if($row=mysqli_fetch_array($result)){
				$name=$row["user"];
				$photo=$row["photo"];
				$title=$row["title"];
				$spec=$row["speciality"];
				$past=strtotime($row['start'])>time() || $row['isWeekly'] ? "a" : "d";
				$pastMessage= strtotime($row['start'])>time() || $row['isWeekly'] ? "":"Past Meeting Time";
				$duration=$row['duration'];
				$start=strtotime($row['start']);
				$formattedStart=date("g:i A",$start);
				$end=date("g:i A", strtotime($row['end']));
				$weekly= $row['isWeekly'] ? "Weekly: ".date("l",$start) : date("l, M j", $start);
				$title=$row['title'];
				$loc=$row['location'];
				$AUID=$row["AUID"];
				
				$today=getDate();
				$testday = $today['mday'];
				$day=intval(date("j",$start));
				$month=intval(date("n",$start));
				$year=intval(date("Y",$start));	
				
				if(empty($_GET))
				{
					$timeframe="thisweek";
				}
				else
				{
					$timeframe=$_GET["filter"];
				}
				
				switch ($timeframe)
				{
					case "today":
						if($today['mday']==$day and $today['mon']==$month and $today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";		
							$numAppt++;
						}				
						break;
						
					case "thisweek";
						$beginweek = $today['mday'] - $today['mday']%7;
						$endweek = $today['mday']+7 - ($today['mday']+7)%7;						
						if($beginweek <= $day and $day <= $endweek and $today['mon']==$month and $today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";				
							$numAppt++;
						}				
						break;

					case "month";
						if($today['mon']==$month and $today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";	
							$numAppt++;
						}				
						break;
						
					case "all";
					
						if($today['year']==$year)
						{
							$table.="							<tr>
													<td>$name</td>
													<td class='right'>$title</td>
													<td class='right'>$loc</td>
													<td class='right'>$weekly $formattedStart - $end</td>
												</tr>";				
							$numAppt++;
						}				
						break;						
				}
		}
	}
	$_SESSION['numAppt'] = $numAppt;
	$_SESSION['appointments'] = $table;
?>