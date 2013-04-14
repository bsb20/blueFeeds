<?php
session_start();
$table="`test`.`feeds`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$url=$_POST["feedUrl"];
$title=$_POST["feedName"];
$UUID=$_SESSION["UUID"];
$FUID=$_POST["FUID"];

$sql = "SELECT * FROM `test`.`feeds` WHERE `UUID`='$UUID'";
$result=$db->query($sql);

// YQL query (SELECT * from feed ... ) // Split for readability // Organizes yahoo queries  
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $url=$row["url"];
}
//$description = $feed->description;

$filepath = "/home/htdocs/desktop/bluefeedsTest.xml";
	$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$filepath);
	$finally = "";
	foreach($xml->channel->item as $item)
	{
		$title = $item->title;
		$link = $item->link;
		$date = $item->date;
		$desc = $item->description;

		$finally.="						<li>
						<a>$title</a>
						<div>
							<h3>$title</h3>
							$desc
							<p>
								$date
							</p>
							<a href=$link><button class='bg-color-blueLight'> Link </button></a>
							<a href='#'><button class='bg-color-green'> Edit </button></a>
							<a href='#'><button class='bg-color-red'> Delete </button></a>							
						</div>
					</li>";
}
}
echo $finally;
  
?>

