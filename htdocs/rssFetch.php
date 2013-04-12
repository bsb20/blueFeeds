<?php
session_start();
$table="`test`.`feeds`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
echo "PRELOVE";
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
echo "LOVE";
$finally="";
//$description = $feed->description;
$rss = new DOMDocument();
    $rss->load('$url');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));	
		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<p>'.$description.'</p>';
		$finally.="<li data-theme='c' class='dynamicTag' data-dynamicContent='rssFetch' style='margin: 1%; overflow: visible; white-space: normal;'>
		<a href=$url>	
		<h1> $title </h1>
  		<p> $description </p> 
  		</a>
		</li>";
  		
	}
}
echo $finally;
  
?>

