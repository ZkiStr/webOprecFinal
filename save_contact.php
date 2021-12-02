<?php

require_once('dbconnect.php');

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
  
        $sql = "INSERT INTO save_contact(nama,email,pesan) VALUES('$nama', '$email', '$pesan')";
        // Insert user data into table
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // Show message when user added

            echo "Pesan Berhasil Terkirim!";

            echo "<script>
                window.alert('Pesan Berhasil Terkirim!')
                window.location='index.html'
                </script>";

        } else {
            // Show message when user added
            echo "Pesan gagal Terkirim!";
        }
}
?>