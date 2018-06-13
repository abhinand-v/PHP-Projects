<?php
require "init.php";
$s_id = $_POST["sid"];
$d_name = $_POST["d_name"];
$d_imei = $_POST["d_imei"];

$genID = 1;
$sql_genID = "select max(sl_no) from device_register;";
$result = mysqli_query($con,$sql_genID);
$resp_create = [];
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);
    if($row[0] == "")
    {
        $sql_in = "insert into device_register values($genID,'$d_name','$d_imei','$s_id');";
		
        if(mysqli_query($con,$sql_in))
			$message = "Device Registered! Now Login";
		else
			$message = "Failed to Register !";
		
		array_push($resp_create,array("message"=>$message));
		echo json_encode($resp_create);
    } else {
        $genID = $row[0];
        $genID +=1;
        $sql_in = "insert into device_register values($genID,'$d_name','$d_imei','$s_id');";
        
		if(mysqli_query($con,$sql_in))
			$message = "Device Registered! Now Login";
		else
			$message = "Device Already Registered!";
		
		array_push($resp_create,array("message"=>$message));
		echo json_encode($resp_create);
    }
}
mysqli_close($con);
?>