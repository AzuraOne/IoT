<?php
error_reporting(0);
include 'koneksi_s.php';

if (isset($_GET['id']))
{
    $id_sensor = $_GET['id'];

    $query ="DELETE from sensor where id_sensor='$id_sensor'";
    $result = mysqli_query($koneksi, $query);

    if (!$result)
    {
        die("Data gagal di tambahakan; ".mysqli_errno);

if (!$result)
    {
        die("Data gagal di tambahakan; ".mysqli_errno($koneksi). mysqli_error($koenksi));

    }
    else
    {
        echo "<script>
        alert('Data berhasil dihapus');window.location.href='index_s.php'</script>";

    }
}
}
?>