<?php
error_reporting(0);
include 'koneksi_d.php';

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$Id_device		= $_POST['Id_device'];	
	$Nama_device	= $_POST['Nama_device'];		
	$Deskripsi		= $_POST['Deskripsi'];	
	
	$query = "UPDATE device SET Nama_device = '$Nama_device' WHERE Id_device = '$Id_device'";
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	$updated = mysqli_affected_rows($koneksi);

	//jika query update sukses
	if($updated){
		
		echo "<script>alert('Data berhasil di simpan!')</script>";		//Pesan jika proses simpan sukses
		// header('location: index_d.php');	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit_d.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 
}else{	//jika tidak terdeteksi tombol simpan di klik
 
	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
 
}
?>