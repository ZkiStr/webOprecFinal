<!DOCTYPE html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='Admin'){
        header("location:../login.php");
    };
    $query = mysqli_query($conn,'SELECT * FROM admin ORDER BY adminid DESC');
    $data = mysqli_fetch_array($query);
    $adminid = $_SESSION['adminid'];
	?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>OPREC HIMATIF</title>
    <link rel="stylesheet" href="../css/style-index.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-apple'></i>
      <span class="logo_name">HIMATIF</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Profile</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Profile</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Profile</a></li>
          <li><a href="#">Edit profile</a></li>
          <li><a href="#">Ganti Password</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Pendaftaran</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Pendaftaran</a></li>
          <li><a href="#">Form Pendaftaran</a></li>
          <li><a href="#">Schedule Oprec</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
     <div class="profile-content">
        <img src="../assets/img/user.png" alt="">
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $data["nama_admin"];?></div>
        <div class="job"><?php echo $data["adminemail"];?></div>
      </div>
      <a href="../logout.php"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard admin</span>
    
  </div>
  </section>
  <script src="../js/script.js"></script>
</body>
</html>
