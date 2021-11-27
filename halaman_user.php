<!DOCTYPE html>
<html>
<head>
 <title>Halaman Pimpinan</title>
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
 <h1>Halaman Pengguna Biasa</h1>

 <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
 <a href="logout.php">LOGOUT</a>

 <br/>
 <br/>

</body>
</html>