<?php
require "init.php";
$stud_id = $_POST['sid'];
$query = "select * from project_titles_db where sid = '$stud_id' ;";
$result = mysqli_query($con,$query);
$response = [];
if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
	{
	    $message = "hasdata";
	    array_push($response,array("message"=>$message));
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