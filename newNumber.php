



















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
$page= '<page> 
Input 
<form action="/tkl/ussd/Pay.php">
<entry kind="digits" var="number">
<prompt>the number to pay:</prompt>
</entry>
</form>
</page>';
echo $page;
$telkomFooter = '</pages>';
echo $telkomFooter;
?>

