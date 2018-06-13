<?php
require "init.php";
$query = "select * from project_titles_db;";
$result = mysqli_query($con,$query);
$response = [];
if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
	{
	    $message = "hasdata";
	    array_push($response,array("id"=>$row["id"],"group_id"=>$row["group_id"],"mem_name_1"=>$row["mem_name_1"],"proj_title"=>$row["proj_title"],"status"=>$row["status"],"proj_lang"=>$row["proj_lang"],"message"=>$message));
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