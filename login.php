<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="style2.css">
<form action="proseslogin.php" method="POST">
  <div class="imgcontainer">
    <img src="profile.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
   <button><a href="daftar.php"> SignUp</button></a>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="reset" value="Cancel" class="cancelbtn">Cancel</button><button name="cancel" value="Back" class="cancelbtn"><a href="index.php">Back</button>

  </div>
</form>
</body>
</html>