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
$numberplate = '';
if(isset($_GET['numberplate']))
{ 
   $numberplate = $_GET['numberplate'];
  // echo $nplate1;
  }


$page= '<page> 
Input 
<form action="/tkl/ussd/Payplan.php">
<entry kind="digits" var="idnumber">
<prompt>Your ID Number '.$numberplate.':</prompt>
</entry>
</form>
</page>';
echo $page;
$telkomFooter = '</pages>';
echo $telkomFooter;




?>
