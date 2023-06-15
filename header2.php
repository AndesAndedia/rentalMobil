<?php 
 session_start();
 if (isset($_SESSION['username'])) {	
    if($_SESSION['lv']=="2"){
        $uname = $_SESSION['username'];
    }else{
        header('location:index.php'); 
    }
 }else{
	header('location:login.php');
 }
 $data = mysqli_query($con,"SELECT * FROM pelanggan RIGHT JOIN user ON user.nik = pelanggan.nik WHERE user.username = '$uname'");
$arr = mysqli_fetch_array($data);