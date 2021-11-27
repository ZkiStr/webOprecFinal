<?php

//kalau update
if(isset($_POST['update'])){
  update();
  };
 
function update(){
  global $conn;
  $userid = $_POST['id'];
  $namalengkap = $_POST['namalengkap'];
  $whatsapp = $_POST['whatsapp'];

  $update =mysqli_query($conn,"update userdatadonasi set nama='$namalengkap', whatsapp='$whatsapp' where userid='$userid'");
  if($update){
  //berhasil bikin
    echo "<div class='alert alert-success'>Berhasil update data.</div>
    <meta http-equiv='refresh' content='2; url=mydata-donasi.php'/> ";
  } else {
    echo "<div class='alert alert-warning'> Gagal update data. Silakan coba lagi nanti.</div>
    <meta http-equiv='refresh' content='3; url=mydata-donasi.php'/> ";
  }
}

if(isset($_POST['submit'])){
  $userid = $_POST['id'];
  $namalengkap = $_POST['namalengkap'];
  $whatsapp = $_POST['whatsapp'];

        $submitdata = mysqli_query($conn,"insert into userdatadonasi (userid, nama, whatsapp) values('$userid','$namalengkap','$whatsapp')");
        if($submitdata){ 
        //berhasil bikin
          echo " <div class='alert alert-success'> Berhasil submit data.</div>
          <meta http-equiv='refresh' content='2; url=mydata-donasi.php'/> ";
        } else {
          echo "<div class='alert alert-warning'> Gagal submit data. Silakan coba lagi nanti.</div>
          <meta http-equiv='refresh' content='3; url=daftar-donasi.php'/>";
        }
};

    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdatadonasi set status='Verified', tglkonfirmasi='$today' where userid='$id'");

      if($updateaja){
        //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
      </div>
      <meta http-equiv='refresh' content='1; url=mydata-donasi.php'/>  ";  
      }else {
        echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url=mydata-donasi.php'/> ";
      }
    };
?>