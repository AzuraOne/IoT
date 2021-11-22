<?php 
error_reporting(0);
require 'koneksi_s.php';
if (isset($_GET["id"])) {
    $id = ($_GET["id"]);

    $result = mysqli_query($koneksi, "SELECT * FROM sensor WHERE id_sensor = '$id'");
    while($row = mysqli_fetch_array($result)) {
        $Id_sensor = $row["Id_sensor"];
        $Nama_sensor= $row["Nama_sensor"];
        $Deskripsi_sensor= $row["Deskripsi_sensor"];
        $Kondisi_sensor= $row["Kondisi_sensor"];
        $Tanggal_buat= $row["Tanggal_buat"];
        
        }

    }
    else {
    header("location:index_s.php");
}
    
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=sensor-width, initial-scale=1.0">
    <title>Edit Sensor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="edit.css">
</head>
<body>
	
	<form action="edit-proses_s.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	
		<div class="container">
      <div class="brand-title">Edit Data Sensor </div>
    <div class="inputs">
    <label>Id Sensor</label>
    <input type="text" placeholder="Id Sensor" value="<?= $Id_sensor;  ?>" name="Id_sensor" readonly/>
     <label>Nama sensor</label>
    <input type="text" placeholder="Nama Sensor" value="<?= $Nama_sensor;?>" name="Nama_sensor"/>
     <label>Deskripsi sensor</label>
    <input type="text" placeholder="" name="Deskripsi_sensor"  value="<?= $Deskripsi_sensor;  ?>"/>
    <label>Kondisi sensor</label>
    <input type="text" placeholder="" name="Kondisi_sensor"  value="<?= $Kondisi_sensor;  ?>"/>
    <label>Tanggal buat</label>
    <input type="date" placeholder="" name="Tanggal_buat"  value="<?= $Tanggal_buat;  ?>"/>
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