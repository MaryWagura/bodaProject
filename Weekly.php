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


$option = '';
if(isset($_GET['option']))
{ 
   $option = $_GET['option'];

  }


$page= '<page> 
Do you wish to pay with the current number '.$option.'? <br/>
<a href="Pay.php">Yes </a><br/>
<a href="newNumber.php">No</a><br/>
</page>';
echo $page;
$telkomFooter = '</pages>';
echo $telkomFooter;
?>


















