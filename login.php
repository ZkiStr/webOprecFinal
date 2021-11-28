<?php
session_start();
include 'dbconnect.php';
$alert = '';

if(isset($_SESSION['role'])){
	$role = $_SESSION['role'];

	if($role=='Admin'){
		header("location:admin");
	} else {
		header("location:user");
	}	
}

if(isset($_POST['btn-login'])){
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	
	// menyeleksi data user dengan username dan password yang sesuai
	$cariadmin = mysqli_query($conn,"select * from admin where adminemail='$email' and adminpassword='$password'");
	$cariuser = mysqli_query($conn,"select * from user where useremail='$email'");
	
	// menghitung jumlah data yang ditemukan
	$cekadmin = mysqli_num_rows($cariadmin);
	$cekuser = mysqli_num_rows($cariuser);
 
	// cek apakah username dan password di temukan pada database
	if($cekadmin === 1){
		$data = mysqli_fetch_assoc($cariadmin);
		
			$_SESSION['email'] = $data['adminemail'];
			$_SESSION['role'] = "Admin";
			header("location:admin");
		
 	} else if($cekuser === 1){
		$data = mysqli_fetch_assoc($cariuser);
		if(password_verify($password, $data["userpassword"])){
			// buat session login dan username
			$_SESSION['email'] = $data['useremail'];
			$_SESSION['userid'] = $data['userid'];
			$_SESSION['role'] = "User";
			header("location:user");
		} else {
			echo "<div class='alert alert-warning'>Username atau Password salah</div>
    		<meta http-equiv='refresh' content='2'>";
		}
	} else {
	//jika user tidak ditemukan
	echo "<div class='alert alert-warning'>Username atau Password salah</div>
    <meta http-equiv='refresh' content='2'>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/img/icon/favicon.ico" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Sign in & Sign up Form</title>
</head>
<body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="E-mail" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" name="btn-login" value="Login" class="btn solid" />
          </form>
          <?php
if(isset($_POST['btn-daftar'])){
// cek konfirmasi password
  if($_POST['password'] == $_POST['konfirmasi_password']){
    //cek apakah email sudah pernah digunakan
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $lihat1 = mysqli_query($conn,"select * from user where useremail='$email'");
    $lihat2 = mysqli_num_rows($lihat1);
    $password = password_hash($password, PASSWORD_DEFAULT);
      if($lihat2 < 1){
    //email belum pernah digunakan
        $insert = mysqli_query($conn,"insert into user (nama,useremail,userpassword) values ('$nama','$email','$password')");
        //eksekusi query
          if($insert){
              echo "<div class='alert alert-success' role='alert'> Registrasi Berhasil, silahkan login.</div>
              <meta http-equiv='refresh' content='2; url= login.php'/>  ";
          } else {
              //daftar gagal
              echo "<div class='alert alert-warning'>Registrasi gagal, silakan coba lagi.</div>
              <meta http-equiv='refresh' content='2'>";
          }
      } else {
          //jika email sudah pernah digunakan
          $alert = '<strong><font color="red">Email sudah pernah digunakan!</font></strong>';
          echo '<meta http-equiv="refresh" content="2">';
          }
  } else{
    $alert = '<strong><font color="red">pastikan password sama</font></strong>';
    echo '<meta http-equiv="refresh" content="2" url="registrasi.php">';
    }
};
?>
          <form method="post" class="sign-up-form">
            <h2 class="title">Daftar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nama" placeholder="Nama Lengkap" autofocus required/>
              <p class="help-block text-danger"></p>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="E-mail" required/>
              <p class="help-block text-danger"></p>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required="required"/>
              <p class="help-block text-danger"></p>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required="required"/>
              <p class="help-block text-danger"></p>
            </div>
            <input type="submit" name="btn-daftar" class="btn" value="Daftar" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Punya Akun ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              MASUK
            </button>
          </div>
        </div>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>