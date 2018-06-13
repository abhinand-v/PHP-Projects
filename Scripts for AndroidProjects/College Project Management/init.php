<?php
$username = 'id1327671_project_admin';
$password = 'nopassword';
$database = 'id1327671_macfast_proj_man';
$server = 'localhost';
$con = mysqli_connect($server,$username,$password,$database);
if(!$con)
{
   die("Error in connection");
}