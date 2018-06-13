<?php
require "init.php";
$sid = $_POST["sid"];
$query = "SELECT status FROM project_titles_db WHERE sid = '$sid';";
$result = mysqli_query($con,$query);
$response = [];
if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
	{
	    $message = "hasdata";
	    array_push($response,array("message"=>$row["status"]));
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
    echo "<br>no result";
}