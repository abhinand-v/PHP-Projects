<?php
require "init.php";
$group_id = (int)$_POST["group_id"];
$sid = $_POST["sid"];
$mem_name_1 = $_POST["mem_name_1"];
$proj_title = $_POST["proj_title"];
$proj_lang = $_POST["proj_lang"];
$status = $_POST['status'];

$genID = 1;
$sql_genID = "select max(id) from project_titles_db;";
$result = mysqli_query($con,$sql_genID);
$resp_create = [];
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);
    if($row[0] == "")
    {
        $sql_in = "insert into project_titles_db values($genID,$group_id,'$sid','$mem_name_1','$proj_title','$proj_lang','$status');";
		
        if(mysqli_query($con,$sql_in))
			$message = "Submited";
		else
			$message = "Failed to submit !".mysqli_error($con);
		
		array_push($resp_create,array("message"=>$message));
		echo json_encode($resp_create);
    } else {
        $genID = $row[0];
        $genID +=1;
		
       $sql_in = "insert into project_titles_db values($genID,'$group_id','$sid','$mem_name_1','$proj_title','$proj_lang','$status');";
		
        if(mysqli_query($con,$sql_in))
			$message = "Submited";
		else
			$message = "Failed to submit !".mysqli_error($con);
		
		array_push($resp_create,array("message"=>$message));
		echo json_encode($resp_create);
    }
}
mysqli_close($con);
?>