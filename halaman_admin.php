<!DOCTYPE html>
<html>
<head>
 <title>Halaman admin</title>
</head>
<body>
<?php 
	session_start();
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	} else {
		$role = $_SESSION['role'];
	}
	?>
 <h1>Ini Halaman Admin</h1>

 <p>Halo
     <br>Anda telah login sebagai <b> ADMIN</b>.</p>
 <a href="logout.php">LOGOUT</a>

 <br/>
 <br/>

</body>
</html>