<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            $qry_login=mysqli_query($koneksi,"select * from siswa where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_siswa']=$dt_login['id_siswa'];
                $_SESSION['nama_siswa']=$dt_login['nama_siswa'];
                $_SESSION['status_login']=true;
                header("location: home.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>
<!--Penjelasan:
Sintak if($_POST){ bertujuan untuk mencegah muncul error Ketika user mengunjungi file proses_login.php ini tanpa method post. Jika memiliki data kiriman berupa post maka akan dieksekusi jika tidak maka tidak ternjadi apa-apa.
Data post akan disimpan kedalam variable $username dan $password dan sintak if(empty($username)){ yang artinya data post tersebut akan divalidasi apakah menyimpan data atau kosong jika tidak menyimpan data atau kosong maka akan memunculkan alert username tidak boleh kosong atau password tidak boleh kosong.
Jika variable nya tidak kosong maka akan diuji dalan query mysql apakah data username dan password sudah benar atau tidak dengan menggunakan sintak sebagai berikut $qry_login=mysqli_query($conn,"select * from siswa where username = '".$username."' and password = '".md5($password)."'");
Sintak if(mysqli_num_rows($qry_login)>0){ menguji apakah dengan username dan password tersebut ada atau tidak didalam table user yang mana menampilkan jumlah baris , jika mengujian menunjukkan diatas 1 baris maka username dan password tersebut dianggap benar dan akan dilanjutkan proses penyimpanan data user login yang mana akan disimpan ke dalam session dengan sintak sebagai berikut 
$dt_login=mysqli_fetch_array($qry_login);
session_start();
      $_SESSION['id_siswa']=$dt_login['id_siswa'];
      $_SESSION['nama_siswa']=$dt_login['nama_siswa'];
      $_SESSION['status_login']=true;
Setelah itu akan diredirect ke halaman home.php

kenapa ditambah petik 1 karena username itukan string, kalo query biasausername='' 
tapi karna pake variabel jadi '."".'
session nyimpen datanya disetiap halaman agar ketika nilainya false masih dilogin-->