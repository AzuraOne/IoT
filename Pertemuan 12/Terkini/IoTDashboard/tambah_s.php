<?php
    error_reporting(0);
  include 'koneksi_s.php';
?>

<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=sensor-width, initial-scale=1.0">
    <title>Tambah Sensor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="edit.css">
</head>
</head>
<body>
  
  <form action="tambah-proses_s.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id; ?>">  
    <div class="container">
      <div class="brand-title">Tambah Data Sensor </div>
      <div class="inputs">
     
      <label>Nama sensor</label>
      <input type="text" name="Nama_sensor" size="30" required>
       <label>Deskripsi_sensor</label>
      <input type="text" name="Deskripsi_sensor" size="30" required>
       <label>Kondisi_sensor</label>
      <input type="text" name="Kondisi_sensor" size="30" required>
       <label>Tanggal_buat</label>
      <input type="date" name="Tanggal_buat" size="30" required>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td><input type="submit" name="tambah" value="Tambah"></td>
      </tr>
    </table>
  </form>
</body>
</html>