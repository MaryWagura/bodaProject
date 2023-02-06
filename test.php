<?php
header("Content-Type:application/xml");

//show php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$telkomHeader = '      
<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE pages SYSTEM "cellflash-1.3.dtd">
<pages>';
$telkomFooter = '</pages>';

$telkomRequest = $_SERVER['REQUEST_URI'];
$requestURIs = explode("/", $telkomRequest);
$path = '';
for ($i = 0; $i < count($requestURIs); $i++) {
    if ($i == 2) {
        $path = $requestURIs[2];
    }
}

if ($path == '') {
    $page = $path;
    echo $path;
    
} else if ($path == 'Numberplate.xml') {
    $page = $path;
    echo $page;

} else if ($path == 'IDNumber.xml') {
    $page = $path;
    echo $page;

} else if ($path == 'Payplan.xml') {
    $page = $path;
    echo $page;
} else if ($path == 'Daily.xml') {
    $page = $path;
    echo $page;
} else if ($path == 'Weekly.xml') {
    $page = $path;
    echo $page;

} else if ($path == 'Monthly.xml') {
    $page = $path;
    echo $page;

} else if ($path == 'newNumber.xml') {
    $page = $path;
    echo $page;

} else if ($path == 'Pay.xml') {
    $page = $path;
    echo $page;

}
$page = "hello";

echo $telkomHeader . $page. $telkomFooter;
?>v
