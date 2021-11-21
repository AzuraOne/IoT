<?php
error_reporting(0);
include 'koneksi_d.php';

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$Id_device		= $_POST['Id_device'];	
	$Nama_device	= $_POST['Nama_device'];		
	$Deskripsi		= $_POST['Deskripsi'];	
	
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE device SET Id_device='$Id_device', Nama_device='$Nama_device', Deskripsi='$Deskripsi' WHERE Id_device='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="edit_d.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit_d.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 
}else{	//jika tidak terdeteksi tombol simpan di klik
 
	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
 
}
?>