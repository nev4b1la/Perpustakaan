<?php 
if($_GET['id']){
    include "koneksi.php";
    $id_peminjaman_buku=$_GET['id'];
    $cek_terlambat=mysqli_query($koneksi, "select * from peminjaman_buku where id_peminjaman_buku = '".$id_peminjaman_buku."' ");
    $dt_pinjam=mysqli_fetch_array($cek_terlambat);
    if(strtotime($dt_pinjam['tanggal_kembali'])>=strtotime(date('Y-m-d'))){
        $denda=0;
    } else{
        $harga_denda_perhari=5000;
        $tanggal_kembali = new DateTime();
        $tgl_harus_kembali = new DateTime($dt_pinjam['tanggal_kembali']); 
        $selisih_hari = $tanggal_kembali->diff($tgl_harus_kembali)->d;
        $denda=$selisih_hari*$harga_denda_perhari;
    }
    mysqli_query($koneksi, "insert into pengembalian_buku (id_peminjaman_buku, tanggal_pengembalian,denda) value('".$id_peminjaman_buku."','".date('Y-m-d')."','".$denda."')");
    header('location: histori_peminjaman.php');
}
?>
<!--Penjelasan:
Di proses pengembalian buku ini ada beberapa proses yang dilakukan secara berurutan yang pertama adalah 
pengecekan tanggal Kembali dengan sintak seperti ini if(strtotime($dt_pinjam['tanggal_kembali'])>=strtotime(date('Y-m-d')))
{ ini berarti jika tanggal target kembali lebih besar dari tanggal sekarang maka denda 0, tetapi jika sebaliknya maka denda 
sebesar 5.000 rupiah perharinya. Kemudian kita hitung lama harinya dengan sintak berikut $selisih_hari = 
$tanggal_kembali->diff($tgl_harus_kembali)->d; lalu kita hitung dendanya dengan sintak ini
$denda=$selisih_hari*$harga_denda_perhari; baru kita melakukan insert ke table pengembalian_buku setelah itu akan 
diredirect ke histori_peminjaman.php-->
