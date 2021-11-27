<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='User'){
        header("location:../login.php");
    };
    $userid = $_SESSION['userid'];

    include 'submit-1.php';

    //cek dulu sudah pernah submit belum
    $cekdulu = mysqli_query($conn,"select * from userdatawebinar where userid='$userid'");
    $lihathasil = mysqli_num_rows($cekdulu);
    
    //kalau udah pernah submit
    if($lihathasil>0){
        header("location:verified-1.php");
    } else {
    };
	?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PARTI 2021 | Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../assets/select2-4.0.6-rc.1/dist/css/select2.min.css">
    
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-144808195-1');
	</script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader">process..</div>
    </div>
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php"><img src="../assets/img/logo21.png" alt="Parti 2021" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li ><a href="index.php"><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="daftar-webinar.php"><i class="ti-layout"></i><span>Event</span></a>
                            </li>
                            <li>
                                <a href="daftar-lomba.php"><i class="ti-layout"></i><span>Competition</span></a>
                            </li>
                            <li>
                                <a href="daftar-donasi.php"><i class="ti-layout"></i><span>Donate</span></a>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a> 
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
            						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            						var date = new Date();
            						var day = date.getDate();
            						var month = date.getMonth();
            						var thisDay = date.getDay(),
            							thisDay = myDays[thisDay];
            						var yy = date.getYear();
            						var year = (yy < 1000) ? yy + 1900 : yy;
            						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                </script>
                            </div></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- panduan -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Pendaftaran Webinar</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
										 Selamat datang di sistem informasi Pendaftaran PARTI 2021.
                                         <br>Sistem ini disusun oleh Team PARTI HIMATIF.
                                         <br><br>
                                         Panduan Pendaftaran:
                                         <br>1. Isi seluruh formulir yang ditampilkan kemudian simpan.
                                         <br>2. Gunakan email yang aktif karena akan digunakan untuk pengiriman e-Sertifikat.
                                         <br>3. pastikan data sudah benar kemudian klik konfirmasi. Setelah di-confirm, data tidak dapat diubah kembali.
                                         <br>4. Jika sudah, bukti pendaftaran akan ditampilkan dan dapat diunduh menjadi PDF
                                         <br>
                                         <br>*Note: Pihak PARTI HIMATIF baru akan menerima data Anda setelah Anda klik 'konfirmasi'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!------------------ Pisahin ------------------->

                <form method="post" enctype="multipart/form-data">
                <!-- formulir -->
                    <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>INFORMASI DASAR</h2>
                                    
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input name="email" type="email" class="form-control" placeholder="Email" maxlength="40" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="foto" class="form-control-label">Foto Identitas(ktm/sejenisnya), maks 1Mb </label>
                                                    <input type="file" id="foto" name="foto" class="form-control-file" required>
                                                    <input type="hidden" value="<?=$userid;?>" name="id">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label>No.Whatsapp</label>
                                                    <input name="whatsapp" type="number" class="form-control" placeholder="No Whatsapp" maxlength="15" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>           
        </div>
        <!-- main content area end -->

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Copyright &copy <script type='text/javascript'> var credityear = new Date();document.write(credityear.getFullYear()); </script> | PARTI - HIMATIF</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
    <script src="../assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
    <script src="../assets/js/app.js"></script>
</body>

</html>
