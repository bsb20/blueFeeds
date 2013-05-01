<?php
/* Retrieves all comments for a specific student with a specific tag and then stores the html list in the commentList session variable */
session_start();
$table="`test`.`tags`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$_SESSION['commentList'] = "";
$UUID=$_SESSION["UUID"];
$sql = "SELECT * FROM `test`.`tags` WHERE `UUID`='$UUID'";
$result=$db->query($sql);
$commentList="";
$filter = $_POST['filter'];
for($i=0; $i<mysqli_num_rows($result); $i++){
	if($row=mysqli_fetch_array($result)){
		$text=$row["text"];
		$TUID=$row["TUID"];
		if($text==$_POST['filter'])
		{
			$table="`test`.`tu`";
			$table2="`test`.`comments`";
			$UUID=$_SESSION["UUID"];
			$SUID=$_SESSION["SUID"];
			$GUID=$_SESSION["GUID"];
			$sql = "SELECT * FROM `test`.`tu` INNER JOIN `test`.`comments` ON `test`.`tu`.`CUID` = `test`.`comments`.`CUID` WHERE `test`.`comments`.`SUID` ='".$SUID."' AND `GUID`='$GUID' AND `test`.`tu`.`TUID` ='".$TUID."';";
			$result=$db->query($sql);
			for($i=0; $i<mysqli_num_rows($result); $i++){
				if($row=mysqli_fetch_array($result))
				{
					$title=$row["title"];
					$text=$row["text"];
					$CUID=$row["CUID"];
					$date=$row["date"];
					$time=strtotime($date);
					$formattedDate=date("m/d/y",$time);	
					$editlink = "editComment.php?CUID=" . $CUID;
					$deletelink = "deleteComment.php?CUID=" . $CUID;					
				}
				$commentList.="						<li>
								<a>$title</a>
								<div>
									$text
									<p>
										$formattedDate
									</p>
									<a href=$editlink><button class='bg-color-blueLight'> Edit </button></a>
									<a href=$deletelink><button class='bg-color-red'> Delete </button></a>																
								</div>
							</li>";
			}
			header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentCommentsTags.php?filter=' . $filter);
		}
    }
}
$_SESSION['commentList'] = $commentList;
header('Location: http://bluefeeds.cs.duke.edu/home/htdocs/desktop/StudentCommentsTags.php?filter=' . $filter);	
?>
