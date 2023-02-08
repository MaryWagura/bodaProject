<?php
header('Content-Type: text/xml');

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

$page= '<page> 
Choose a payment plan below<br/>
<a href="Daily.php?option=daily">Daily</a><br/>
<a href="Weekly.php?option=weekly">Weekly</a><br/>
<a href="Monthly.php?option=monthly">Monthly</a><br/>
</page>';
echo $page;
$telkomFooter = '</pages>';
echo $telkomFooter;

?>













