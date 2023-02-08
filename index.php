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
    if ($i == 4) {
        $path = $requestURIs[4];
    }
}
$page= '';
if ($path == '') {
    $page = '<page> 
Welcome to BodaBoda Tax Services<br/>
<a href="ussd/Numberplate.php">Pay Taxes</a><br/>
<a href="Compliance.xml">Compliance Certiticate</a><br/>
</page>';

   
} else if ($path == 'Numberplate.php') {
  
   
    
} else if ($path == 'IDNumber.xml') {
if (isset($_POST['numberplate'])) {
    $numberplate =$_POST['numberplate'];
    }
    $page = '<page> 
Input 
<form action="/tkl/ussd/Payplan.xml" method="POST">
<entry kind="digits" var="idnumber">
<prompt>Your ID Number:'+$numberplate+':</prompt>
</entry>
</form>
</page>';
   
} else if ($path == 'Payplan.xml') {
    $page = '<page> 

<entry kind="digits" var="payplan">
Choose a payment plane below
<a href="Daily.xml">Daily </a>
<a href="Weekly.xml">Weekly</a>
<a href="Monthly.xml">Monthly </a>

</page>';
    
} else if ($path == 'Daily.xml') {
    $page = '<page> 
<entry kind="digits" var="daily">
Do you wish to pay with the current number?
<a href="Pay.xml">Yes </a>
<a href="newNumber.xml">No </a>
</page>';
 
} else if ($path == 'Weekly.xml') {
    $page = '<page> 
    <entry kind="digits" var="weekly">
Do you wish to pay with the current number?
<a href="Pay.xml">Yes </a>
<a href="newNumber.xml">No </a>
</page>';
   
} else if ($path == 'Monthly.xml') {
    $page = '<page> 
    <entry kind="digits" var="monthly">
Do you wish to pay with the current number?
<a href="Pay.xml">Yes </a>
<a href="newNumber.xml">No </a>
</page>';
 
} else if ($path == 'newNumber.xml') {
    $page = '<page> 
<entry kind="digits" var="newnum">

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
