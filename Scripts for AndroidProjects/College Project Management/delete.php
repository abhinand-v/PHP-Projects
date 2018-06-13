<?php
require "init.php";
$gid = $_POST["gid"];
$sql_get_sid = "SELECT `sid` FROM `project_titles_db` WHERE group_id = '$gid';";
$result = mysqli_query($con,$sql_get_sid);
$row = mysqli_fetch_array($result);
$sid = $row["sid"];

$sql_delete = "DELETE FROM `project_titles_db` WHERE `group_id` ='$gid';";
$sql_delete_dev = "DELETE FROM `device_register` WHERE `student_id` = '$sid';";
$rsp_del = [];

if(mysqli_query($con,$sql_delete) && mysqli_query($con,$sql_delete_dev))
			$msg_del = "Deleted! Refresh to see changes";
		else
			$msg_del = "Failed to delete !";
		
		array_push($rsp_del,array("message"=>$msg_del));
		echo json_encode($rsp_del);
?>
