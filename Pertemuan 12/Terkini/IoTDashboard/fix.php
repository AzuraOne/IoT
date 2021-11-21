<?php 
include "config.php";
$id_suhu = $_GET['id_suhu'];
$id_kelembapan = $_GET['id_kelembapan'];
$id_ruang = $_GET['id_ruang'];

$querysuhu = mysqli_query($conn, "SELECT Ruangan.Id_ruangan, Ruangan.Nilai_suhu, Ruangan.Nilai_kelembapan, Sensor_suhu.Id_suhu ,Sensor_suhu.Suhu, Sensor_kelembapan.kelembapan, Sensor_kelembapan.Id_kelembapan FROM Ruangan LEFT JOIN Sensor_suhu ON Sensor_suhu.Id_ruangan = Ruangan.Id_ruangan LEFT JOIN Sensor_kelembapan ON Sensor_kelembapan.Id_ruangan = Ruangan.Id_ruangan WHERE Ruangan.Id_ruangan = $id_ruang");
$sensor = mysqli_fetch_array($querysuhu);
$Nilai_suhu = $sensor['Nilai_suhu'];
$Nilai_kelembapan = $sensor['Nilai_kelembapan'];

date_default_timezone_set('Asia/Jakarta');
$date =  date('d-m-Y H:i:s');



$devices = mysqli_query($conn, "SELECT Ruangan_device.Id_device, Ruangan_device.Kondisi, Device.Nama_device FROM Ruangan_device LEFT JOIN Device on Device.Id_device = Ruangan_device.Id_device WHERE Ruangan_device.Id_ruangan = '$id_ruang' ORDER BY Ruangan_device.Ruangiddevice DESC LIMIT 1");
$device = mysqli_fetch_array($devices);
$id_device = $device['Id_device'];



if ($id_suhu) {
    $qsuhu = mysqli_query($conn, "INSERT INTO Sensor_suhu (Id_suhu, Suhu, Tanggal_suhu, Id_ruangan) VALUES (NULL, '$Nilai_suhu', '$date', '$id_ruang')");
    $device = mysqli_query($conn, "INSERT INTO Ruangan_device (Ruangiddevice, Id_ruangan, Id_device, Kondisi) VALUES (NULL, '$id_ruang', '$id_device', 'Tidak Menyala')");
    echo "<script>alert('Sukses memperbaiki suhu!')</script>";
    header("location: dashboard.php");
 
}
elseif ($id_kelembapan) {
    $qlembab = mysqli_query($conn, "INSERT INTO Sensor_kelembapan (Id_kelembapan, kelembapan, Tanggal_kelembapan, Id_ruangan) VALUES (NULL, '$Nilai_kelembapan', '$date', '$id_ruang');");
    $device = mysqli_query($conn, "INSERT INTO Ruangan_device (Ruangiddevice, Id_ruangan, Id_device, Kondisi) VALUES (NULL, '$id_ruang', '$id_device', 'Tidak Menyala')");
    echo "<script>alert('Sukses memperbaiki kelembapan!')</script>";
    header("location: dashboard.php");
    
    
    
    # code...
}
?>