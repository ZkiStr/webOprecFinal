<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdatadonasi where userid='$u'");
    $ambil = mysqli_fetch_array($cekdulu);
    // //get alamat
    // $ambilprov = $ambil['provinsi'];
    // $prov1 = mysqli_query($conn,"select name from provinces where id='$ambilprov'");

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"select * from userdatadonasi where userid='$u'");
$html = '<center><h3>Parade Teknik Informatika 2021</h3></center><br>
<center><h3>Himpunan Mahasiswa Teknik Informatika</h3></center><br>
<center><h3>Universitas Muhammadiyah Surakarta</h3></center><br>';

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Donasi - PARTI-HIMATIF 2021.pdf');
?>

 