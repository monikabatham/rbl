<?php 

$Host = "ksdc4169rvm03.c733mqe3ibv4.ap-northeast-1.rds.amazonaws.com";
$user = "userbinwp1";
$password = "~+4/8BdC#G&2";
$db = "binwp1";


$conn = mysqli_connect($Host,$user,$password,$db); 

if (!$conn) {
   die('Could not connect: ' . mysqli_error());
} 
?>