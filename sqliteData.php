<?php
$today=date("F j Y g:i a"); 
$filename="logondb.db";
$db_handle  = new SQLite3($filename);
$row="";

//check for incoming data
//data1 will be a csv String

if(isset($_GET['data1'])){  
	$d1=explode (",",$_GET['data1']);
	foreach ($d1 as $x){
		//echo $x."<br>";		
	}
$query_string="INSERT INTO log VALUES ( '$today', '$d1[0]','$d1[1]','$d1[2]','$d1[3]','$d1[4]','$d1[5]','$d1[6]','$d1[7]');";
$db_handle->exec($query_string);
Echo "success";
//$db_handle->close();
exit;
}
 


 
 
 

?>
