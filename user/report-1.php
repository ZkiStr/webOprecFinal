<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdatawebinar where userid='$u'");
    $ambil = mysqli_fetch_array($cekdulu);
    // //get data
    // $ambilprov = $ambil['namalengkap'];
    // $nama1 = mysqli_query($conn,"select name from namalengkap where id='$ambilprov'");
    // $nama = mysqli_fetch_array($nama1)['name'];

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"select * from userdatawebinar where userid='$u'");
$html = '<center><h3>Parade Teknik Informatika 2021</h3></center><br>
<center><h3>Himpunan Mahasiswa Teknik Informatika</h3></center><br>
<center><h3>Universitas Muhammadiyah Surakarta</h3></center><br><br>
<h3><hr>Data Peserta Webinar</h3><br><br><br>
<table>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td>'.$ambil['namalengkap'].'</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td>'.$ambil['email'].'</td>
	</tr>
	<tr>
		<td>No.Whatsapp</td>
		<td>:</td>
		<td>'.$ambil['whatsapp'].'</td>
	</tr>
	<tr>
		<td>Foto Identitas</td>
		<td>:</td>
		<td>'.$ambil['foto'].'</td>
	</tr>
</table>

';


$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Webinar - PARTI-HIMATIF 2021.pdf');
?>
 
