<?php 
 session_start();
 if (isset($_SESSION['nama'])) {
 	
 }else{
	header('location:login.php');
 }
 ?>