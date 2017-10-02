<?php
include_once 'config.php';
include_once 'koneksi.php';
include_once '../dao/RsDao.php';
$idrs = $_GET['idrs'];
$rsdao = new RsDao();
$rsdao->delete_rs($idrs);
echo "<script>window.location='../index.php?page=semuarumahsakit'; </script>";
?>
