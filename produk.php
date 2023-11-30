<?php 
    include "header_produk.php";
?>
<h2>Daftar Buku</h2>
<div class="row">
    <?php 
    include "koneksi.php";
    $qry_buku=mysqli_query($conn,"select * from produk");
    while($dt_buku=mysqli_fetch_array($qry_buku)){
        ?>
        <div class="col-md-3">
            <div class="card" >
              <img src="assets/<?=$dt_buku['foto']?>" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
                <p class="card-text"><?=substr($dt_buku['deskripsi'], 0,20)?></p>
                <a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
              </div>
            </div>
        </div>
        <?php
    }
    ?>
    
</div>
<a href="tambah_buku.php"  class="btn btn-primary">Tambah Buku</a>   
<?php 
    include "footer_produk.php";
?>
<!--Penjelasan
Di halaman buku ini menampilkan semua data buku dengan menggunakan query select * from buku dengan menyertakan foto buku,
 nama buku, deskripsi dan tombol pinjam yang memiliki url : pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>.
arti dari url tersebut adalah id_buku sebagai variable url menyimpan data id_buku yang akan dikirim ke halaman pinjam_buku.php.-->