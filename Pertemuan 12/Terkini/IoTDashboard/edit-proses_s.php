<?php
error_reporting(0);
include 'koneksi_s.php';

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$Id_sensor			= $_POST['Id_sensor'];	
	$Nama_sensor		= $_POST['Nama_sensor'];		
	$Deskripsi_sensor	= $_POST['Deskripsi_sensor'];
	$Kondisi_sensor		= $_POST['Kondisi_sensor'];
	$Tanggal_buat		= $_POST['Tanggal_buat'];	
	
	$query = "UPDATE sensor SET Id_sensor='$Id_sensor', Nama_sensor='$Nama_sensor', Deskripsi_sensor='$Deskripsi_sensor', 
	Kondisi_sensor='$Kondisi_sensor', Tanggal_buat='$Tanggal_buat' WHERE Id_sensor='$Id_sensor'";
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	$updated = mysqli_affected_rows($koneksi);
	//jika query update sukses
	if($updated){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="edit_s.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit_s.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 
}else{	//jika tidak terdeteksi tombol simpan di klik
 
	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
 
}
?>