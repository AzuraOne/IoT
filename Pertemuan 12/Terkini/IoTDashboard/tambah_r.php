<?php
    error_reporting(0);
  include 'koneksi_r.php';
?>

<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="edit.css">
</head>
</head>
<body>
  
  <form action="tambah-proses_r.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">  
    <div class="container">
      <div class="brand-title">Tambah Data Ruangan </div>
      <div class="inputs">
      
      <label>Nama Ruangan</label>
      <input type="text" name="Nama_ruangan" size="30" required>
      <label>Deskripsi</label>
      <input type="text" name="Deskripsi_ruangan" size="30" required >
       <label>Nilai Suhu</label>
      <input type="text" name="Nilai_suhu" size="30" required>
       <label>Nilai Kelembapan</label>
      <input type="text" name="Nilai_kelembapan" size="30" required>
      <label>Tanggal</label>
      <input type="date" name="Tanggal" size="30" required>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td><input type="submit" name="tambah" value="Tambah"></td>
      </tr>
    </table>
  </form>
</body>
</html>