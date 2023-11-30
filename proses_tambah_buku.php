<?php 
include 'koneksi.php';

$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$deskripsi = $_POST['deskripsi'];
 

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$tempdir = "assets/";
 
if(!in_array($ext,$ekstensi) ) {
	header("location:tambah_buku.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 10440700){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], $tempdir.$xx);
		mysqli_query($koneksi, "INSERT INTO buku VALUES(NULL,'$nama_buku','$pengarang','$deskripsi','$xx')");
		header("location:buku.php?alert=berhasil");
	}else{
		header("location:tambah_buku.php?alert=gagak_ukuran");
	}
}