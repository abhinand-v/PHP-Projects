<?php
require "init.php";
$sid = $_POST["sid"];
//$sid = 'LEM1701';
$query = "SELECT device_imei FROM device_register WHERE student_id = '$sid';";
$result = mysqli_query($con,$query);
$response = [];
if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
	{
	    $message = "hasdata";
	    array_push($response,array("message"=>"$message"));
	}
	echo json_encode($response);
    }
    else
    {
        $message = "nodata";
	array_push($response,array("message"=>$message));
        echo json_encode($response);
    }
}
else
{
    $message = "nodata";
	array_push($response,array("message"=>$message));
        echo json_encode($response);
}