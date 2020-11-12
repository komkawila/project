<?php
 error_reporting(0);
 error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Bangkok");

$dbname="db_project";
 
$host="localhost";
$user="root";
$pass="12345678";
 


$con=mysqli_connect("$host","$user","$pass","$dbname");
@mysqli_query($con,"SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno()){
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
 
 // ชื่อตาราง 
	$admin ="admin"; 
	$bill ="bill"; 
	$bill_detail ="bill_detail"; 
	$contact ="contact"; 
	$member = "member";
	$meter = "meter";
	$rent = "rent";
	$room_type = "room_type";
	$room = "room";
	$utility = "utility";
	$province = "province";
 ?>
