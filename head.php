<?php 
 session_start();
 if (isset($_SESSION['nama'])) {
	if($_SESSION['lv']=="1"){
        $uname = $_SESSION['username'];
    }else{
        header('location:indexLogin.php'); 
    }
 }else{
	header('location:login.php');
 }
 ?>