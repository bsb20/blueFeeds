<?php
include("initialize.php");
$terms=$_POST['search'];
$words= explode(" ", $terms);
$final="";
for($i=0; $i<count($words); $i++){
$sql="SELECT * FROM `test`.`courses` WHERE `title` LIKE '%$words[$i]%'";
$result=$db->query($sql);
$title;
$info;
$GUID;
$SUID=$_SESSION['SUID'];
$html="";
$repeated=array();
    for($i=0; $i<mysqli_num_rows($result); $i++){
        if($row=mysqli_fetch_array($result)){
            if(!in_array($row["GUID"],$repeated)){
                array_push($repeated, $row["GUID"]);
                 $title=$row["title"];
                 $info=$row["info "];
		 $GUID=$row["GUID"];
                 $final.="<li class='dynamicSelection' data-dynamicContent='selection'>
                    <a href='#'>
                    	<h1>$title</h1>
			<p>$info</p>
                    </a>
                    <input type='text' class='guid' style='display:none' value='$GUID'>
                    </li>";
                }
             }
         }
}
echo $final;
?>
