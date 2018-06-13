<?php
require "init.php";
$stud_id = $_POST['sid'];
$query = "select * from device_register where student_id = '$stud_id' ;";
$result = mysqli_query($con,$query);
$response = [];
if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
	{
	    $message = "hasdata";
	    array_push($response,array("device_name"=>$row["device_name"],"device_imei"=>$row["device_imei"],"message"=>$message));
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
    echo "<br>no data";
}