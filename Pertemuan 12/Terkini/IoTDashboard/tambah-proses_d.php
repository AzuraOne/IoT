<?php
error_reporting(0);
include 'koneksi_d.php';

if (isset($_POST['tambah'])) {

    $id_device = $_POST['id_device'];
    $nama_device = $_POST['nama_device'];
    $deskripsi = $_POST['deskripsi'];
    

    
        $query = "INSERT INTO device (id_device, nama_device,  deskripsi) VALUES('$id_device', '$nama_device', '$deskripsi') ";

        $result = mysqli_query($koneksi, $query);
if (!$result) {
            die("Gagal Input data " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else 
        {
            echo "<script>alert('Data berhasil ditambahkan');document.location.href='index_d.php'</script> ";
        }
}

?>