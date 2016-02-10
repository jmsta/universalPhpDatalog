<!DOCTYPE html>
<html>
<head>
<title>WU ITS LOG</title>
<link rel="stylesheet" type="text/css" href="style2.css"> 
</head>
<body>

<?php
 
// this Script will take get varaiables and:
// 1. Write A CSV Files
// 2. List CSV files 
// 3. View A CSV File
//
// Get VARS for writing CSV are data0=filename data1=column1 data2=Column2 -- Colum 0 always time stamp
//                           
// Get VAR for viewing CSV file  CSV=filename

$today=date("F j Y g:i a");  

//check to see if we are sending data 
  if(isset($_GET['data0'])){  
	$fname=$_GET['data0'];
	
 	if(isset($_GET['data1'])){  
	$d1=$_GET['data1'];
	} else{
		$d1="";
		}
	  	
  	if(isset($_GET['data2'])) { 
	$d2=$_GET['data2'];
	} else{
		$d2="";
	}
		 
	$myfile = fopen($fname, "a") or die("0");
	fwrite($myfile,$today.",".$d1.$d2."\r\n");
	//fwrite($myfile,$today.",".$d1.",".$d2."\r\n");//old
    fclose($myfile); 
	}  
	  
	  
//Check to see if we are reading a csv file 	  
  if (isset($_GET['csv'])){
	 $csvName=$_GET['csv'];
	//was error here jms//  echo $this;
	 jj_readcsv($csvName,false); 
	  
  }
 
//default will display list of csv files  
if (empty($_GET)) {
//Echo "<div class='CSSTableGenerator' >";
Echo "<table border='1' style=width:50%><tr><th><h1>CSV Files Available</h1></th>\r\n ";
	foreach (glob("*.csv") as $filename) {
    echo "<tr><td><a href=data.php?csv=".$filename.">".$filename."</a></td></tr>\r\n";
		}
	echo "</table>";
	//Echo "</div>";
	 }
  
 

function jj_readcsv($filename, $header=False) {
$handle = fopen($filename, "r");
echo "<div class='CSSTableGenerator' >";
echo '<table border="1">';
//display header row if true
if ($header) {
    $csvcontents = fgetcsv($handle);
    echo '<tr>';
    foreach ($csvcontents as $headercolumn) {
        echo "<th>$headercolumn</th>";
    }
    echo '</tr>';
}
// displaying contents
while ($csvcontents = fgetcsv($handle)) {
    echo '<tr>';
    foreach ($csvcontents as $column) {
        echo "<td>$column</td>";
    }
    echo '</tr>';
}
echo '</table>';
fclose($handle);
echo "</div>";
}
   
?>

</body>
 </html>
