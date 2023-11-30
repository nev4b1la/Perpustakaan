<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        $lama_pinjam=5; //satuan hari
        $tgl_harus_kembali=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_pinjam),date('Y')));
        mysqli_query($koneksi,"insert into peminjaman_buku (id_siswa,tanggal_pinjam,tanggal_kembali) value('".$_SESSION['id_siswa']."','".date('Y-m-d')."','".$tgl_harus_kembali."')");
         $id=mysqli_insert_id($koneksi);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($koneksi,"insert into detail_peminjaman_buku (id_peminjaman_buku,id_buku,qty) value('".$id."','".$val_produk['id_buku']."','".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil meminjam buku");location.href="histori_peminjaman.php"</script>';
    }
?>
<!--
    di dalam proses checkout ini ada beberapa proses yang dijalankan secara berurutan, 
    yang pertama system mengecek dahulu apakah cart mengandung data dengan sintak if(count($cart)>0){ . 
    kemudian diset lama pinjam di variable $lama_pinjam. 
    Setelah itu kita ambil tanggal lama pinjam dari waktu pinjam (tanggal sekarang + lama pinjam, ketemu tanggal 
    setelah lama pinjam) dengan menggunakan sintak $tgl_harus_kembali=date('Y-m-d',mktime(0,0,0,date('m'),
    (date('d')+$lama_pinjam),date('Y')));. Kemudian kita insert data ke dalam table peminjaman. Lalu melakukan insert 
    lagi ke table detail_peminjaman_buku semua item buku yang dipinjam. Setelah itu session yang Bernama cart dihapus 
    dan langsung meredirect ke histori_peminjaman.php-->