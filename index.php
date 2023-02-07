<?php
header('Content-Type: text/xml');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$telkomHeader = '      
<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE pages SYSTEM "cellflash-1.3.dtd">
<pages>';
echo $telkomHeader;

$telkomRequest = $_SERVER['REQUEST_URI'];
$requestURIs = explode("/", $telkomRequest);
$path = '';

for ($i = 0; $i < count($requestURIs); $i++) {
    if ($i == 3) {
        $path = $requestURIs[3];
    }
}
$page= '';
if ($path == '') {
    $page = '<page> 
Welcome to BodaBoda Tax Service<br/>
<a href="ussd/Numberplate.xml">Pay Taxes </a>
<a href="Compliance.xml">Compliance Certiticate </a>
</page>';

   
} else if ($path == 'Numberplate.xml') {
    $page = '<page> 
Input 
<form action="/tkl/ussd/IDNumber.xml" method="POST">
<entry kind="digits" var="zip">
<prompt>Number Plate</prompt>
</entry>
</form>
</page>';
    
} else if ($path == 'IDNumber.xml') {
    $page = '<page> 
Input 
<form action="/tkl/ussd/Payplan.xml" method="POST">
<entry kind="digits" var="zip">
<prompt>Your ID Number</prompt>
</entry>
</form>
</page>';
   
} else if ($path == 'Payplan.xml') {
    $page = '<page> 
Choose a payment plane below
<a href="Daily.xml">Daily </a>
<a href="Weekly.xml">Weekly</a>
<a href="Monthly.xml">Monthly </a>

</page>';
    
} else if ($path == 'Daily.xml') {
    $page = '<page> 
Do you wish to pay with the current number?
<a href="Pay.xml">Yes </a>
<a href="newNumber.xml">No </a>
</page>';
 
} else if ($path == 'Weekly.xml') {
    $page = '<page> 
Do you wish to pay with the current number?
<a href="Pay.xml">Yes </a>
<a href="newNumber.xml">No </a>
</page>';
   
} else if ($path == 'Monthly.xml') {
    $page = '<page> 
Do you wish to pay with the current number?
<a href="Pay.xml">Yes </a>
<a href="newNumber.xml">No </a>
</page>';
 
} else if ($path == 'newNumber.xml') {
    $page = '<page> 
Pay Tax
<a href="Pay.xml">Input the number to pay </a>

</page>';
   
} else if ($path == 'Pay.xml') {
    $page = '<page> 
Mpesa STK Push


</page>';

}

echo $page;


$telkomFooter = '</pages>';
echo $telkomFooter;
?>
