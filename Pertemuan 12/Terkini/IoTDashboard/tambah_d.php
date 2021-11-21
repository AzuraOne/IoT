  <?php
    error_reporting(0);
  include 'koneksi_d.php';
?>

<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Device</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="edit.css">
</head>
</head>
<body>
  
  <form action="tambah-proses_d.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">  
    <div class="container">
      <div class="brand-title">Tambah Data Device </div>
      <div class="inputs">
      <label>Id_Device</label>
      <input type="text" name="id_device" required>
      <label>Nama Device</label>
      <input type="text" name="nama_device" size="30" required>
       <label>Deskripsi</label>
      <input type="text" name="deskripsi" size="30" required>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td><input type="submit" name="tambah" value="Tambah"></td>
      </tr>
    </table>
  </form>
</body>
</html>