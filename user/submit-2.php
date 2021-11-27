<?php

//kalau update
if(isset($_POST['update'])){
  update();
  };

function update(){
  global $conn;
  $userid = $_POST['id'];
  $namalengkap = $_POST['namalengkap'];
  $email = $_POST['email'];
  $whatsapp = $_POST['whatsapp'];
  $fotoidlama = $_POST['fotoidlama'];
    if($_FILES['fotoid']['error'] === 4){
      $path_foto = $fotoidlama;
      $update = mysqli_query($conn,"update userdatalomba set namalengkap='$namalengkap', email='$email', whatsapp='$whatsapp', fotoid='$path_foto' where userid='$userid'");
            if($update){
            //berhasil bikin
              echo "<div class='alert alert-success'>Berhasil update data.</div>
              <meta http-equiv='refresh' content='1; url=mydata-lomba.php'/> ";  
            } else {
              echo "<div class='alert alert-warning'> Gagal update data. Silakan coba lagi nanti.</div>
              <meta http-equiv='refresh' content='3; url=mydata-lomba.php'/> ";
            }
    }else{
      $newfoto = $_FILES['fotoid'];
      $newfoto = 'foto_'.$namalengkap;
      $nama_file_foto = $_FILES['fotoid']['name'];
      $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
      $ukuran_file_foto = $_FILES['fotoid']['size'];
      $ukurantotal = $ukuran_file_foto;
      $tipe_file = $_FILES['fotoid']['type'];
      $tmp_file = $_FILES['fotoid']['tmp_name'];
      $path_foto = "images/fotolomba/".$newfoto.'.'.$ext1;
      

  if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    if($ukurantotal <= 1010000){ 
      $upload = move_uploaded_file($tmp_file, $path_foto);

        if($upload){
          $update = mysqli_query($conn,"update userdatalomba set namalengkap='$namalengkap', email='$email', whatsapp='$whatsapp', fotoid='$path_foto' where userid='$userid'");
            if($update){
            //berhasil bikin
              echo "<div class='alert alert-success'>Berhasil update data.</div>
              <meta http-equiv='refresh' content='2; url=mydata-lomba.php'/> ";  
            } else {
              echo "<div class='alert alert-warning'> Gagal update data. Silakan coba lagi nanti.</div>
              <meta http-equiv='refresh' content='3; url=mydata-lomba.php'/> ";
            }
        } else {
      // Jika gambar gagal diupload, Lakukan :
        echo "<div class='alert alert-warning'> Sorry, there's a problem while uploading the file.</div>
        <br><meta http-equiv='refresh' content='5; URL=mydata-lomba.php'/> You will be redirected to the form in 5 seconds";
      }
    } else {
    // Jika ukuran file lebih dari 1MB, lakukan :
      echo "<div class='alert alert-warning'> Sorry, the file size is not allowed to more than 1Mb.</div>
      <br><meta http-equiv='refresh' content='5; URL=mydata-lomba.php'/> You will be redirected to the form in 5 seconds";
    }
  } else {
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "<div class='alert alert-warning'> Sorry, the image format should be JPG/PNG.</div>
    <br><meta http-equiv='refresh' content='5; URL=mydata-lomba.php'> You will be redirected to the form in 5 seconds";
  }
}
}

if(isset($_POST['submit'])){
  $userid = $_POST['id'];
  $namalengkap = $_POST['namalengkap'];
  $email = $_POST['email'];
  $whatsapp = $_POST['whatsapp'];
  //perihal gambar
  $foto = 'foto_'.$namalengkap;
  $nama_file_foto = $_FILES['fotoid']['name'];
  $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
  $ukuran_file_foto = $_FILES['fotoid']['size'];
  $ukurantotal = $ukuran_file_foto;
  $tipe_file = $_FILES['fotoid']['type'];
  $tmp_file = $_FILES['fotoid']['tmp_name'];
  $path_foto = "images/fotolomba/".$foto.'.'.$ext1;

  if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    if($ukurantotal <= 1010000){ 
      $upload = move_uploaded_file($tmp_file, $path_foto);

      if($upload){
        $submitdata = mysqli_query($conn,"insert into userdatalomba (userid, namalengkap, email, whatsapp, fotoid) values('$userid','$namalengkap','$email','$whatsapp','$path_foto')");
        if($submitdata){ 
        //berhasil bikin
          echo " <div class='alert alert-success'> Berhasil submit data.</div>
          <meta http-equiv='refresh' content='2; url=daftar-lomba.php'/> ";
        } else {
          echo "<div class='alert alert-warning'> Gagal submit data. Silakan coba lagi nanti.</div>
          <meta http-equiv='refresh' content='3; url=daftar-lomba.php'/>";
        }
      } else {
      // Jika gambar gagal diupload, Lakukan :
        echo "<div class='alert alert-warning'> Sorry, there's a problem while uploading the file.</div>
        <br><meta http-equiv='refresh' content='5; URL=daftar-lomba.php'/> You will be redirected to the form in 5 seconds";
      }
    } else {
    // Jika ukuran file lebih dari 1MB, lakukan :
      echo "<div class='alert alert-warning'> Sorry, the file size is not allowed to more than 1Mb.</div>
      <br><meta http-equiv='refresh' content='5; URL=daftar-lomba.php'/> You will be redirected to the form in 5 seconds";
    }
  } else {
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "<div class='alert alert-warning'> Sorry, the image format should be JPG/PNG.</div>
    <br><meta http-equiv='refresh' content='5; URL=daftar-lomba.php'> You will be redirected to the form in 5 seconds";
  }
};

    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdatalomba set status='Verified', tglkonfirmasi='$today' where userid='$id'");

      if($updateaja){
        //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
      </div>
      <meta http-equiv='refresh' content='1; url=mydata-webinar.php'/>  ";  
      }else {
        echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url=mydata-webinar.php'/> ";
      }
    };
?>