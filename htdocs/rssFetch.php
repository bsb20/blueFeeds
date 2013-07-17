<?php

/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This php script retrieves and displays rss entries from the desktop managed BlueFeeds Rss Site.
*/

include("initialize.php");
$table="`test`.`feeds`";
$url=$_POST["feedUrl"];
$title=$_POST["feedName"];
$UUID=$_SESSION["UUID"];
$FUID=$_POST["FUID"];

$sql = "SELECT * FROM `test`.`feeds` WHERE `UUID`='$UUID' OR `UUID`='a'";

$result=$db->query($sql);
$finally = "";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
	$url=$row["url"];
    }
    $xml =simplexml_load_file("$url");
foreach($xml->channel->item as $item)
	{
	    $title = $item->title;
	    $link = $item->link;
	    $date = $item->date;
	    $desc = $item->description;
	    $finally.="<li data-theme='c' class='dynamicTag' data-dynamicContent='rssFetch' style='margin: 1%; overflow: visible; white-space: normal;'>
	    <a href='$link'>	
	    <h1> $title </h1>
	    <p> <small><em>Posted on $date</em></small></p>
  	    <p> $desc </p> 
  	    </a>
	    </li>";
	}
}
echo $finally;
?>

