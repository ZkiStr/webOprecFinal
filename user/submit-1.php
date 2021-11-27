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
  $fotolama = $_POST['fotolama'];
    if($_FILES['foto']['error'] === 4){
      $path_foto = $fotolama;
      $update = mysqli_query($conn,"update userdatawebinar set namalengkap='$namalengkap', email='$email', foto='$path_foto', whatsapp='$whatsapp' where userid='$userid'");
            if($update){
            //berhasil bikin
              echo "<div class='alert alert-success'>Berhasil update data.</div>
              <meta http-equiv='refresh' content='1; url=mydata-webinar.php'/> ";  
            } else {
              echo "<div class='alert alert-warning'> Gagal update data. Silakan coba lagi nanti.</div>
              <meta http-equiv='refresh' content='3; url=mydata-webinar.php'/> ";
            }
    }else{
      $newfoto = $_FILES['foto'];
      $newfoto = 'foto_'.$namalengkap;
      $nama_file_foto = $_FILES['foto']['name'];
      $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
      $ukuran_file_foto = $_FILES['foto']['size'];
      $ukurantotal = $ukuran_file_foto;
      $tipe_file = $_FILES['foto']['type'];
      $tmp_file = $_FILES['foto']['tmp_name'];
      $path_foto = "images/foto/".$newfoto.'.'.$ext1;
 
  if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    if($ukurantotal <= 1010000){ 
      $upload = move_uploaded_file($tmp_file, $path_foto);

        if($upload){
          $update = mysqli_query($conn,"update userdatawebinar set namalengkap='$namalengkap', email='$email', whatsapp='$whatsapp', foto='$path_foto', whatsapp='$whatsapp' where userid='$userid'");
            if($update){
            //berhasil bikin
              echo "<div class='alert alert-success'>Berhasil update data.</div>
              <meta http-equiv='refresh' content='1; url=daftar-webinar.php'/> ";  
            } else {
              echo "<div class='alert alert-warning'> Gagal update data. Silakan coba lagi nanti.</div>
              <meta http-equiv='refresh' content='3; url=mydata-webinar.php'/> ";
            }
        } else {
      // Jika gambar gagal diupload, Lakukan :
        echo "<div class='alert alert-warning'> Sorry, there's a problem while uploading the file.</div>
        <br><meta http-equiv='refresh' content='5; URL=mydata-webinar.php'/> You will be redirected to the form in 5 seconds";
      }
    } else {
    // Jika ukuran file lebih dari 1MB, lakukan :
      echo "<div class='alert alert-warning'> Sorry, the file size is not allowed to more than 1Mb.</div>
      <br><meta http-equiv='refresh' content='5; URL=mydata-webinar.php'/> You will be redirected to the form in 5 seconds";
    }
  } else {
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "<div class='alert alert-warning'> Sorry, the image format should be JPG/PNG.</div>
    <br><meta http-equiv='refresh' content='5; URL=mydata-webinar.php'> You will be redirected to the form in 5 seconds";
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
  $nama_file_foto = $_FILES['foto']['name'];
  $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
  $ukuran_file_foto = $_FILES['foto']['size'];
  $ukurantotal = $ukuran_file_foto;
  $tipe_file = $_FILES['foto']['type'];
  $tmp_file = $_FILES['foto']['tmp_name'];
  $path_foto = "images/foto/".$foto.'.'.$ext1;

  if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    if($ukurantotal <= 1010000){ 
      $upload = move_uploaded_file($tmp_file, $path_foto);
      if($upload){
        $submitdata = mysqli_query($conn,"insert into userdatawebinar (userid, namalengkap, email, whatsapp, foto) values('$userid','$namalengkap','$email','$whatsapp','$path_foto')");
        if($submitdata){ 
        //berhasil bikin
          echo "<script>
            alert ('coba dulu')
          </script>"
          // echo " <div class='alert alert-success'> Berhasil submit data.</div>
          // <meta http-equiv='refresh' content='1; url=mydata-webinar.php'/> ";
        } else {
          echo "<div class='alert alert-warning'> Gagal submit data. Silakan coba lagi nanti.</div>
          <meta http-equiv='refresh' content='2; url=daftar-webinar.php'/>";
        }
      } else {
      // Jika gambar gagal diupload, Lakukan :
        echo "<div class='alert alert-warning'> Sorry, there's a problem while uploading the file.</div>
        <br><meta http-equiv='refresh' content='5; URL=daftar-webinar.php'/> You will be redirected to the form in 5 seconds";
      }
    } else {
    // Jika ukuran file lebih dari 1MB, lakukan :
      echo "<div class='alert alert-warning'> Sorry, the file size is not allowed to more than 1Mb.</div>
      <br><meta http-equiv='refresh' content='5; URL=daftar-webinar.php'/> You will be redirected to the form in 5 seconds";
    }
  } else {
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "<div class='alert alert-warning'> Sorry, the image format should be JPG/PNG.</div>
    <br><meta http-equiv='refresh' content='5; URL=daftar-webinar.php'> You will be redirected to the form in 5 seconds";
  }
};

    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdatawebinar set status='Verified', tglkonfirmasi='$today' where userid='$id'");

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