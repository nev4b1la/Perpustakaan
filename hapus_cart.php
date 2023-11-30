<?php
    session_start();
    unset($_SESSION['cart'][$_GET['id']]);
    header('location: keranjang.php');
?>
<!--Penjelasan:
Sintak unset($_SESSION['cart'][$_GET['id']]); adalah untuk menghapus session yang bernama cart. 
Stelah penghapus selesai akan di redirect ke halaman keranjang.php.-->