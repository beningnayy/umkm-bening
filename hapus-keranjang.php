<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_user      = $_SESSION['id_user'];
$id_keranjang = isset($_GET['id']) ? intval($_GET['id']) : 0;

// hanya hapus kalau memang milik user ini
mysqli_query($koneksi, "DELETE FROM tb_keranjang WHERE id_keranjang='$id_keranjang' AND id_user='$id_user'");

header('location: keranjang.php');
exit;
