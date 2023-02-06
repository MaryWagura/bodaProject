<?php
header("Content-Type:application/xml");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_GET['numberplate']) && $_GET['numberplate']!="") 
{   include('db.php');
	$numberplate = $_GET['numberplate'];
	$result = mysqli_query(
	$conn,
	"SELECT * FROM `ownerdetails` WHERE `numberplate`='$numberplate'");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$IDNumber = $row['IDNumber'];
    $phonenumber = $row['phonenumber'];
	// $response_code = $row['response_code'];
	// $response_desc = $row['response_desc'];
	response($numberplate, $IDNumber,$phonenumber);
	mysqli_close($conn);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, NULL,400,"Invalid Request");
	}

    function response($numberplate,$IDNumber,$phonenumber){
        $response['numberplate'] = $numberplate;
        $response['IDNumber'] = $IDNumber;
        $response['phonenumber'] = $phonenumber;
        // $response['response_code'] = $response_code;
        // $response['response_desc'] = $response_desc;
        $testXML = '
        <?xml version="1.0" encoding="ISO-8859-1"?>
        <!DOCTYPE pages SYSTEM "cellflash-1.3.dtd">
        <pages>
        <page> 
        Input 
        <form action="/tkl/ussd/IDNumber.xml" method="POST">
        <entry kind="digits" var="zip">
        <prompt>Number Plate</prompt>
        </entry>
        </form>
        </page>
        </pages>
        ';
        // $json_response = json_encode($response);
        echo $testXML ;
    }






?>
