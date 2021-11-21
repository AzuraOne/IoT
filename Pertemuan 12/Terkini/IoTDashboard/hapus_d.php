<?php
error_reporting(0);
include 'koneksi_d.php';

if (isset($_GET['id']))
{
    $id_device = $_GET['id'];

    $query ="DELETE from device where id_device='$id_device'";
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
        alert('Data berhasil dihapus');window.location.href='index_d.php'</script>";

    }
}
}
?>