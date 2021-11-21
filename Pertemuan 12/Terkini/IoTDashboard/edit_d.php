<?php 
error_reporting(0);
require 'koneksi_d.php';
if (isset($_GET["id"])) {
    $id = ($_GET["id"]);

    $result = mysqli_query($koneksi, "SELECT * FROM device WHERE id_device = '$id'");
    while($row = mysqli_fetch_array($result)) {
        $Id_device = $row["Id_device"];
        $Nama_device= $row["Nama_device"];
        $Deskripsi= $row["Deskripsi"];
        
        }

    }
    else {
    header("location:index_d.php");
}
    
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Device</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="edit.css">
</head>
<body>
	
	<form action="edit-proses_d.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	
		<div class="container">
      <div class="brand-title">Edit Data Device </div>
    <div class="inputs">
    <label>Id Device</label>
    <input type="text" placeholder="" />
     <label>Nama Device</label>
    <input type="text" placeholder="" />
     <label>Deskripsi</label>
    <input type="text" placeholder="" />
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