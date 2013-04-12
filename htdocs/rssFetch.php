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
$user=$_SESSION["UUID"];
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

$path = "http://query.yahooapis.com/v1/public/yql?q=";  
$path .= urlencode("SELECT * FROM feed WHERE url='$url'");  
$path .= "&format=json"; 
$feed = file_get_contents($path, true);
$feed = json_decode($feed);
//$description = $feed->description;

}
echo $finally;
  
?>

