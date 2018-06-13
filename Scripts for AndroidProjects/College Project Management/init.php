<?php
$username = 'project_admin';
$password = 'password';
$database = 'macfast_proj_man';
$server = 'localhost';
$con = mysqli_connect($server,$username,$password,$database);
if(!$con)
{
   die("Error in connection");
}
