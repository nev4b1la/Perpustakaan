<?php 
session_start();
    if($_POST){
        include "koneksi.php";
        
        $qry_get_buku=mysqli_query($koneksi,"select * from buku where id_buku = '".$_GET['id_buku']."'");
        $dt_buku=mysqli_fetch_array($qry_get_buku);
        $_SESSION['cart'][]=array(
            'id_buku'=>$dt_buku['id_buku'],
            'nama_buku'=>$dt_buku['nama_buku'],
            'qty'=>$_POST['jumlah_pinjam']
        );
    }
    header('location: keranjang.php');
?>
<!--
Penjelasan:
Di sintak ini menjelaskan proses memasukkan item buku ke dalam keranjang. Dengan mensisipkan file koneksi ke 
database dengan sintak include "koneksi.php";  .
Dan menampilkan detail buku dengan query berikut $qry_get_buku=mysqli_query($conn,"select * from buku where 
id_buku = '".$_GET['id_buku']."'");. Kemudian datanya dijadikan array dengan sintak ini $dt_buku=mysqli_fetch_array($qry_get_buku);. 
Kemudian data array tersebut disimpan kedalam variable session dengan nama cart yang berupa array multidimensi. 
Jangan lupa session harus diaktifkan dengan cara meletakkan sintak session_start(); paling atas atau diatasnya deklarasi session.-->