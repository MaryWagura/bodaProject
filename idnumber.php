<?php
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
$numberplate = '';
if(isset($_GET['numberplate']))
{ 
   $numberplate = $_GET['numberplate'];
  // echo $nplate1;
  }


$result = $conn->query( "SELECT * FROM `ownerdetails` WHERE  `numberplate` = '$numberplate'" );
$row= mysqli_fetch_array($result);
//$num= $row[ 'numberplate' ];
//echo $num;


if (mysqli_num_rows($result) == 1) {
    $page = '<page> 
Input 
<form action="/tkl/ussd/Payplan.php">
<entry kind="digits" var="idnumber">
<prompt>Your ID Number for the numberplate:'.$numberplate.':</prompt>
</entry>
</form>
</page>';
    echo $page;
    $telkomFooter = '</pages>';
    echo $telkomFooter;
} else {
    $page = '<page> 
The numberplate does not exist.
<form action="/tkl/ussd/idnumber.php">
<entry kind="digits" var="numberplate">
<prompt>Please try again</prompt>
</entry>
</form>
</page>';
echo $page;

$telkomFooter = '</pages>';
echo $telkomFooter;
}




?>
