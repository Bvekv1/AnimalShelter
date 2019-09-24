<?php
$host ="localhost";
$user = "root";
$password = "";
$database = "spencer";

$conn= new mysqli($host,$user,$password,$database);

if($conn->connect_error)
{
	die("Connection Failed:".$conn->error);
}