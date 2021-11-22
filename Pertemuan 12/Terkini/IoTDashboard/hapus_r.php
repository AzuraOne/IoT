<?php
error_reporting(0);
include 'koneksi_r.php';

if (isset($_GET['id'])) {
    $id_ruangan = $_GET['id'];
    

    $query = "DELETE from ruangan where Id_ruangan='$id_ruangan'";
    $result = mysqli_query($koneksi, $query);
    $resulted = mysqli_affected_rows($koneksi);
    
    if ($resulted == 0) {
        die("Data gagal di tambahakan; " . mysqli_errno($koneksi) . mysqli_error($koenksi));
    } else {
        echo "<script>
    alert('Data berhasil dihapus');window.location.href='index_r.php'</script>";
    }
}
