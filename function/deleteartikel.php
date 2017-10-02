<?php
include_once 'config.php';
include_once 'koneksi.php';
include_once '../dao/ArtikelDao.php';
$noartikel = $_GET['noartikel'];
$kdpenyakit = $_GET['kdpenyakit'];
$artikeldao = new ArtikelDao();
$artikeldao->delete_artikel($noartikel);
echo "<script>window.location='../index.php?page=artikellist&kdpenyakit=".$kdpenyakit."'; </script>";
?>
