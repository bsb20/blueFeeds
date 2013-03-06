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

$sql = "SELECT * FROM `test`.`tu` INNER JOIN `test`.`comments` ON `test`.`tu`.`CUID` = `test`.`comments`.`CUID` WHERE `test`.`comments`.`UUID` ='".$UUID."';";
$result=$db->query($sql);
    for($i=0; $i<mysqli_num_rows($result); $i++){
        if($row=mysqli_fetch_array($result)){

                            $title=$row["title"];
                            $text=$row["text"];
                            $CUID=$row["CUID"];
                            $date=$row["date"];
        }
        echo "COUNT";
$finally.=        "<li data-theme='d' class='listNote dynamicComment' data-dynamicContent='graphRetrieve' onClick='echoComment()' style='margin: 1%; overflow: visible; white-space: normal;'>
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

<table id="data-table" border="1" cellpadding="75" cellspacing="0" summary="The Amount of QuickNotes for a Student Filtered by Tags.">
  		<!--<caption>Population in thousands</caption> -->
			<thead>
			<tr>
				<td>&nbsp;</td>
				<th scope="col">January</th>
				<th scope="col">February</th>
				<th scope="col">March</th>
				<th scope="col">April</th>
			</tr>
			</thead>
			
			<tbody>
			<tr>
							<th scope="row">Leadership</th>
							<td>4080</td>
							<td>6080</td>
							<td>6240</td>
							<td>3520</td>
						</tr>
						
                    	<tr>
							<th scope="row">Bedside Manner</th>
							<td>5680</td>
							<td>6880</td>
							<td>5760</td>
							<td>5120</td>
						</tr>
						<tr>
							<th scope="row">Communication</th>
							<td>1040</td>
							<td>1760</td>
							<td>2880</td>
							<td>4720</td>
						</tr>
			</tbody>
		</table>
