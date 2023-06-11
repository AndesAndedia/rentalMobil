<?php session_start();
include './connection/koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($con,"SELECT * from user WHERE username='$username' AND password='$password'");
$cek=mysqli_num_rows($query);
$array=mysqli_fetch_array($query);
if ($cek > 0) {
	if($array['lv']=="1"){	
 	$_SESSION['username']=$array['username'];
	$_SESSION['lv']="1";
 	header('location:index.php');
	}else if($array['lv']=="2"){
	$_SESSION['username']=$array['username'];
	$_SESSION['lv']=$array['lv'];
 	header('location:indexLogin.php');
	}
 } else {
 	echo "Login Gagal";echo "<br>";;
 	echo "Silahkan Coba Lagi<a href=login.php> disini";
 }
 $_SESSION['nama'] = $username;


 ?>