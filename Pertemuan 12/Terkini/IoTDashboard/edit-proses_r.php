<?php 
//mulai proses edit data
error_reporting(0);
include 'koneksi_r.php';
 
//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi_r.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$Id_ruangan = $_POST['Id_ruangan'];
    $Nama_ruangan = $_POST['Nama_ruangan'];
    $Deskripsi_ruangan = $_POST['Deskripsi_ruangan'];
    $Nilai_suhu = $_POST['Nilai_suhu'];
    $Nilai_kelembapan = $_POST['Nilai_kelembapan'];
    $Tanggal = $_POST['Tanggal']

	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE sensor SET Id_ruangan='$Id_ruangan', Nama_ruangan='$Nama_ruangan', Deskripsi='$Deskripsi_ruangan, Nilai_suhu='$Nilai_suhu', Nilai_kelembapan='$Nilai_kelembapan', Tanggal= '$Tanggal'  WHERE Id_ruangan='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="edit_r.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit_r.php?id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 
}else{	//jika tidak terdeteksi tombol simpan di klik
 
	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
 
}
?>