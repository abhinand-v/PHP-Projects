<?php
$username = 'id1327671_lgz_tecdaily';
$password = 'balabhumi';
$database = 'id1327671_tecdaily';
$server = 'localhost';

$con = mysqli_connect($server,$username,$password,$database);
$query = "select * from carddata;";
$result = mysqli_query($con,$query);
$response = array();
while($row = mysqli_fetch_array($result))
{
	array_push($response,array("id"=>$row["id"],"title"=>$row["title"],"tag"=>$row["tag"],"time"=>$row["time"],"date"=>$row["date"]));
}
echo json_encode($response);
?>