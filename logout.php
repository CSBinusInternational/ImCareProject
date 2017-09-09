<?php
session_start();

//header("location:login.php");
$_SESSION['isLogin'] = false;
session_destroy();
echo "<script>window.location='login.php'; </script>";	
?>

