<?php
session_start();
$db=new mysqli("127.0.0.1","root","devils","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
$UUID=$_SESSION["UUID"];
$table1="`test`.`su`";
$table2="`test`.`students`";
$sql = "SELECT * FROM $table1, $table2 WHERE $table1.`SUID`=$table2.`SUID` AND $table1.`UUID`='$UUID';";
$result=$db->query($sql);
$name;
$photo;
$title;
$spec;
$html="";
for($i=0; $i<mysqli_num_rows($result); $i++){
if($row=mysqli_fetch_array($result)){
    $name=$row["user"];
    $photo=$row["photo"];
    $title=$row["title"];
    $spec=$row["speciality"];
    $SUID=$row["SUID"];
    }
$html.=           "<li class='dynamicSelection' data-dynamicContent='selection'>
						<a href="./StudentProfile.html">
							<div class="icon">
								<img src='$photo'/>
							</div>
							<div class="data">
								<h4>$name</h4>
									<p id="TileFont">
										$title, $spec
									</p>
									<a href='$email'>$email</a>
							</div>						
						</a>
					</li>";
}
echo $html;

?>