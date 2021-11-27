<?php

require_once('dbconnect.php');

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $pesan = $_POST['pesan'];
  
        $sql = "INSERT INTO save_contact(nama,email,no_hp,pesan) VALUES('$nama', '$email', '$no_hp', '$pesan')";
        // Insert user data into table
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // Show message when user added

            echo "Data Berhasil Disimpan!";

            echo "<script>
                window.alert('Data Berhasil Disimpan!')
                window.location='index.html'
                </script>";

        } else {
            // Show message when user added
            echo "Data Karyawan Gagal Disimpan!";
        }
}
?>