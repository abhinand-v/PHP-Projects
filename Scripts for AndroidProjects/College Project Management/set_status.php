<?php
require "init.php";
$ogroup_id = (int) $_POST["ogid"];
$group_id = (int) $_POST["gid"];
$title = $_POST["title"];
$lang = $_POST["lang"];
$mem = $_POST["mem"];
$status = $_POST["status"];

$sql_get_sid = "SELECT `sid` FROM `project_titles_db` WHERE group_id = '$ogroup_id';";
$result = mysqli_query($con,$sql_get_sid);
$row = mysqli_fetch_array($result);
$sid = $row["sid"];

$reso_update = [];

$sql_update = "UPDATE `project_titles_db` SET `group_id`= $group_id,`proj_title`='$title',`mem_name_1`='$mem',`proj_lang`='$lang',`status`= '$status' WHERE sid = '$sid';";

if(mysqli_query($con,$sql_update))
	$message = "Updated ! Refresh to See changes";
else
	$message = "Failed to Update !";
	
array_push($reso_update,array("message"=>$message));
echo json_encode($reso_update);
?>