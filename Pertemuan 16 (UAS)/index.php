<?php 
include 'config.php';

$suhu = $_GET['suhu'];
$password = $_GET['password'];

$sql = "INSERT INTO sensor_suhu (Id_suhu, Suhu, Tanggal_suhu, Id_ruangan) VALUES (NULL, '$suhu', '22-12-2021 15:00:00', '1')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}