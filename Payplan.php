<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/xml');
require('db.php');

$telkomHeader = '      
<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE pages SYSTEM "cellflash-1.3.dtd">
<pages>';
echo $telkomHeader;
 
$telkomRequest = $_SERVER['REQUEST_URI'];
$requestURIs = explode("/", $telkomRequest);
$path = '';

for ($i = 0; $i < count($requestURIs); $i++) {
    if ($i == 4) {
        $path = $requestURIs[4];
    }
}
$idnumber = '';
if(isset($_GET['idnumber']))
{ 
   $idnumber = $_GET['idnumber'];
  // echo $nplate1;
  }

$result = $conn->query( "SELECT `numberplate` FROM `ownerdetails` where `IDNumber` = '$idnumber'"); 
$row= mysqli_fetch_array($result);
//$idnum = $row['IDNumber'];
//echo $idnum;


// $page= '<page> 
// Choose a payment plan below '.$idnum.'<br/>
// <a href="Daily.php?option=daily">Daily</a><br/>
// <a href="Weekly.php?option=weekly">Weekly</a><br/>
// <a href="Monthly.php?option=monthly">Monthly</a><br/>
// </page>';
// echo $page;
// $telkomFooter = '</pages>';
// echo $telkomFooter;



if (mysqli_num_rows($result) == 1) {
    $page = '<page> 
    Choose a payment plan below '.$idnumber.'<br/>
    <a href="Daily.php?option=daily">Daily</a><br/>
    <a href="Weekly.php?option=weekly">Weekly</a><br/>
    <a href="Monthly.php?option=monthly">Monthly</a><br/>
    </page>';
    echo $page;
    $telkomFooter = '</pages>';
    echo $telkomFooter;
} else {
    $page = '<page> 
The ID number does not exist.Please try again
</page>';
echo $page;

$telkomFooter = '</pages>';
echo $telkomFooter;
}


?>













