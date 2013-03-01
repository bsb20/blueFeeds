<?php
session_start();
$table="`test`.`tu`";
$table2="`test`.`comments`";
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$TUID=$_SESSION["TUID"];
$UUID=$_SESSION["UUID"];
$finally="";
echo "HERE";

$sql = "SELECT * FROM ".$table." JOIN ".$table2." ON (".$table.CUID." = ".$table2.CUID.") WHERE `TUID`='".$TUID."';";
$result=$db->query($sql);
    for($i=0; $i<mysqli_num_rows($result); $i++){
        if($row=mysqli_fetch_array($result)){
                            $title=$row["title"];
                            $text=$row["text"];
                            $CUID=$row["CUID"];
                            $date=$row["date"];
        }
        echo "COUNT";
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
