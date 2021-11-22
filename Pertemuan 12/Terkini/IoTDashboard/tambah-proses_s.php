<?php
error_reporting(0);
include 'koneksi_s.php';

if (isset($_POST['tambah'])) {

  
    $Nama_sensor = $_POST['Nama_sensor'];
    $Deskripsi_sensor = $_POST['Deskripsi_sensor'];
    $Kondisi_sensor = $_POST['Kondisi_sensor'];
    $Tanggal_buat = $_POST['Tanggal_buat'];

    
        $query = "INSERT INTO sensor (Id_sensor, Nama_sensor, Deskripsi_sensor, Kondisi_sensor, Tanggal_buat) VALUES(NULL, '$Nama_sensor', '$Deskripsi_sensor', '$Kondisi_sensor' , '$Tanggal_buat') ";

        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Gagal Input data " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else 
        {
            echo "<script>alert('Data berhasil ditambahkan');document.location.href='index_s.php'</script> ";
        }
}

?>