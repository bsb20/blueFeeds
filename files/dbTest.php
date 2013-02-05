<?php
$db=new mysqli("127.0.0.1","root","root","test",8889);
if($db->connect_errno){
    echo "FAILURE";
}
echo $db->host_info."\n";

?>