<?php
include_once 'config.php';
include_once 'koneksi.php';
include_once '../dao/VideoDao.php';
$novideo = $_GET['novideo'];
$kdpenyakit = $_GET['kdpenyakit'];
$videodao = new VideoDao();
$videodao->delete_video($novideo);
echo "<script>window.location='../index.php?page=videolist&kdpenyakit=".$kdpenyakit."'; </script>";
?>
