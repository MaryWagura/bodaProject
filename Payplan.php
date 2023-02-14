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
$idNum = '';
$numplate = '';
$numberplate = '';


if (isset($_GET['idnumber'])) {
    $idnumber = $_GET['idnumber'];

}
$headers=apache_request_headers();
$current_number ='test';

foreach($headers as $key => $value) {
    if($key == 'User-Msisdn'){
         $current_number = $value;        

    }
    error_log($key.$value);
}


//to fetch the current phone number 
$result=$conn->query("SELECT `phonenumber`,`numberplate` FROM `ownerdetails` WHERE  idnumber = '$idnumber' and phonenumber='$current_number'" );
$row= mysqli_fetch_array($result);



if (mysqli_num_rows($result) == 1) {
    $numplate = $row['numberplate'];
    $current_number= $row['phonenumber'];
 

    if (!empty($result)) {
        $page = '<page> 
    Choose a payment plan below for the numberplate:' . $numplate . '<br/>
    <a href="Daily.php?option=daily">Daily</a><br/>
    <a href="Weekly.php?option=weekly">Weekly</a><br/>
    <a href="Monthly.php?option=monthly">Monthly</a><br/>
    </page>';
        echo $page;
        $telkomFooter = '</pages>';
        echo $telkomFooter;
    } else {
        $page = '<page> 
The ID number does not exist
<form action="/tkl/ussd/Payplan.php">
<entry kind="digits" var="idnumber">
<prompt>Please try again</prompt>
 </entry>
 </form>
</page>';
        echo $page;

        $telkomFooter = '</pages>';
        echo $telkomFooter;
    }
}else 
{
    $page = '<page> 
    The ID number does not exist '.$current_number.'<br/>
    <form action="/tkl/ussd/Payplan.php">
    <entry kind="digits" var="idnumber">
    <prompt>Please try again</prompt>
     </entry>
     </form>
    </page>';
            echo $page;
    
            $telkomFooter = '</pages>';
            echo $telkomFooter;
}



?>