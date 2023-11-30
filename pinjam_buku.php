<?php 
    include "header.php";
    include "koneksi.php";
    $qry_detail_buku=mysqli_query($koneksi,"select * from buku where id_buku = '".$_GET['id_buku']."'");
    $dt_buku=mysqli_fetch_array($qry_detail_buku);
?>
<h2>Pinjam Buku</h2>
<div class="row">
    <div class="col-md-4">
        <img src="assets/<?=$dt_buku['foto']?>" class="card-img-top">
    </div>
    <div class="col-md-8">
        <form action="masukkankeranjang.php?id_buku=<?=$dt_buku['id_buku']?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nama Buku</td><td><?=$dt_buku['nama_buku']?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td><td><?=$dt_buku['deskripsi']?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Pinjam</td><td><input type="number" name="jumlah_pinjam" value="1"></td>
                       </tr>                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" value="PINJAM"></td>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</div>

<?php 
    include "footer.php";
?>
<!--
Penjelasan:
Di tampilan ini diminta untuk menentukan jumlah buku yang akan dipinjamdisertai dengan nama buku dan deskripsi. 
Ketika diklik tombol pinjam maka akan menuju url masukkankeranjang.php?id_buku=<?=$dt_buku['id_buku']?> 
yang mengandung variable url id_buku yang membawa datanya menuju halaman masukkankeranjang.php untuk diproses.-->