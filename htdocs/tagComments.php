<?php
session_start();
$table="`test`.`tu`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$TUID=$_SESSION["TUID"];
$UUID=$_SESSION["UUID"];
$finally="";

$sql = "SELECT * FROM ".$table." WHERE `TUID`='".$TUID."';";
$result=$db->query($sql);
    for($i=0; $i<mysqli_num_rows($result); $i++){
        if($row=mysqli_fetch_array($result)){
            $CUID=$row["CUID"];

                $table2="`test`.`comments`";
                $sql2 = "SELECT * FROM ".$table2." WHERE `CUID`='".$CUID."';";	
                $result2=$db->query($sql2);
                for($i=0; $i<mysqli_num_rows($result2); $i++){
                   if($row=mysqli_fetch_array($result2)){
                            $title=$row["title"];
                            $text=$row["text"];
                            $CUID=$row["CUID"];
                            $date=$row["date"];
                    }
                }
        }
$finally.=        "<li data-theme='d' class='listNote dynamicComment' data-dynamicContent='commentRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
    				      <h1>$title</h1>
					      	<p class='note'>$text</p>
					        	<div data-role='controlgroup' data-type='horizontal'  class='noteControl' align='right'>
                        <a href='#editcomment' data-role='button' data-theme='b' data-mini='true' data-icon='plus'>Edit</a>
						            <a href='#viewcomment' data-role='button'  data-theme='b' data-mini='true' data-icon='info'>View</a>						
						        </div>
					        </li>";
}

echo $finally;
?>
