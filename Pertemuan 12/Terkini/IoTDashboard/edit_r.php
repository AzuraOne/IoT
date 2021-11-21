<?php 
error_reporting(0);
require 'koneksi_r.php';
if (isset($_GET["id"])) {
    $id = ($_GET["id"]);

    $result = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE Id_ruangan = '$id'");
    while($row = mysqli_fetch_array($result)) {
        $Id_ruangan = $row["Id_ruangan"];
        $Nama_ruangan= $row["Nama_ruangan"];
        $Deskripsi_ruangan = $row["Deskripsi_ruangan"];
        $Nilai_suhu= $row["Nilai_suhu"];
        $Nilai_kelembapan= $row["Nilai_kelembapan"];
        $Tanggal= $row["Tanggal"];
        
        }

    }
    else {
    header("location:index_r.php");
}
    
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruangan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="edit.css">
</head>
<body>
	
	<form action="edit-proses_r.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	
		<div class="container">
      <div class="brand-title">Edit Ruangan </div>
    <div class="inputs">
     <label>Nama_ruangan</label>
    <input type="text" placeholder="" />
     <label>Deskripsi_ruangan</label>
    <input type="text" placeholder="" />
    <label>Nilai_suhu</label>
    <input type="text" placeholder="" />
    <label>Nilai_kelembapan</label>
    <input type="text" placeholder="" />
    <label>Tanggal</label>
    <input type="date" placeholder="" />
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="simpan" value="Simpan"></td>
			</tr>
    </div>
		</table>
	</form>
</body>
</html>