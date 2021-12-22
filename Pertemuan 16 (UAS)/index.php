<?php 
include 'config.php';
date_default_timezone_set('Asia/Jakarta');
$date = date('m/d/Y h:i:s a', time());

$suhu = $_GET['suhu'];


$sql = "INSERT INTO sensor_suhu (Id_suhu, Suhu, Tanggal_suhu, Id_ruangan) VALUES (NULL, '$suhu', '$date', '1')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}