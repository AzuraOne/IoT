<?php
error_reporting(0);
include 'koneksi_r.php';

if (isset($_POST['tambah'])) {

    $Id_ruangan = $_POST['Id_ruangan'];
    $Nama_ruangan = $_POST['Nama_ruangan'];
    $Deskripsi_ruangan = $_POST['Deskripsi_ruangan'];
    $Nilai_suhu = $_POST['Nilai_suhu'];
    $Nilai_kelembapan = $_POST['Nilai_kelembapan'];
    $Tanggal = $_POST['Tanggal']

    
        $query = "INSERT INTO ruangan (Id_ruangan, Nama_ruangan, Deskripsi_ruangan, Nilai_suhu, Nilai_kelembapan, Tanggal) VALUES('$Id_ruangan' , '$Nama_ruangan' , '$Deskripsi_ruangan', '$Nilai_suhu' , '$Nilai_kelembapan' , '$Tanggal') ";

        $result = mysqli_query($koneksi, $query);
if (!$result) {
            die("Gagal Input data " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else 
        {
            echo "<script>alert('Data berhasil ditambahkan');document.location.href='tambah-proses_s.php'</script> ";
        }
}

?>