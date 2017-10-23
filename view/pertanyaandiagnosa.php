
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Diagnosa</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
<!--        <a href="../index.php">⇦ Kembali</a>-->
        <h1>Kuisioner Diagnosa</h1>
        <form method="post" action="">
            <ol>
                <li>
                    <p>Masyarakat sekarang memiliki wawasan yang cukup untuk mewaspadaifaktor risiko yang menyebabkan penyakit jantung iskemik (hipertensi, rokok, umur, gaya hidup, obesitas, diabetes, dan gender) dengan demikian mereka dapat terhindar dari penyakit jantung tersebut..</p>
                    <input type="radio" name="p1" value="setuju"> Setuju &emsp;&emsp;
                    <input type="radio" name="p1" value="tidaksetuju"> Tidak Setuju
                    <br><br>
                </li>
                <li>
                    <p>Pada umumnya masyarakat perkotaan lebih sering terkena penyakit jantung iskemik dibandingkan dengan masyarakat yang tinggal di pedesaan atau daerah pelosok.</p>
                    <input type="radio" name="p2" value="setuju"> Setuju &emsp;&emsp;
                    <input type="radio" name="p2" value="tidaksetuju"> Tidak Setuju
                    <br><br>
                </li>
                <li>
                    <p>Pola hidup masyarakat perkotaan (daerah urban) yang lebih sibuk, menuntut melakukan konsumsi makanan yang cepat saji (fastfood) dan juga memilih menggantikan aktivitas tubuh menggunakan bantuan teknologi.</p>
                    <input type="radio" name="p3" value="setuju"> Setuju &emsp;&emsp;
                    <input type="radio" name="p3" value="tidaksetuju"> Tidak Setuju
                    <br><br>
                </li>

                <li>
                    <p>Seberapa seringkah anda mengkonsumsi makanan berlemak yaitu (daging dan makanan yang diolah dengan menggorengnya) dalam satu minggu ?
                        <br>
                        <b>(Berikan tanda silang pada salah satu nomor pada kotak di bawah ini)</b>
                    </p>
                    <----------------- &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -----------------> <br>
                    Semakin Sering        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Tidak Pernah <br>
                    <input type="radio" name="p4" value="1"> 1 &emsp;&emsp;
                    <input type="radio" name="p4" value="2"> 2 &emsp;&emsp;
                    <input type="radio" name="p4" value="3"> 3 &emsp;&emsp;
                    <input type="radio" name="p4" value="4"> 4 &emsp;&emsp;
                    <input type="radio" name="p4" value="5"> 5 
                    <br><br>
                </li>

                <li>
                    <p>Seberapa seringkah anda mengkonsumsi makanan berglukosa tinggi yaitu (nasi, makanan bermanis lainnya) dalam satu minggu ?
                        <br>
                        <b>(Berikan tanda silang pada salah satu nomor pada kotak di bawah ini)</b>
                    </p>
                    <----------------- &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -----------------> <br>
                    Semakin Sering        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Tidak Pernah <br>
                    <input type="radio" name="p5" value="1"> 1 &emsp;&emsp;
                    <input type="radio" name="p5" value="2"> 2 &emsp;&emsp;
                    <input type="radio" name="p5" value="3"> 3 &emsp;&emsp;
                    <input type="radio" name="p5" value="4"> 4 &emsp;&emsp;
                    <input type="radio" name="p5" value="5"> 5 
                    <br><br>
                </li>

                <li>
                    <p>Apakah anda siap secara psikologi dan materi untuk mengeluarkan biaya yang tidak sedikit ( >= 25 juta rupiah), untuk penanganan masalah jantung jika anda atau kerabat anda terkena penyakit jantung iskemik ?
                        <br>
                        <b>(Berikan tanda silang pada salah satu nomor pada kotak di bawah ini)</b>
                    </p>
                    <----------------- &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -----------------> <br>
                    Semakin Sering        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Tidak Pernah <br>
                    <input type="radio" name="p6" value="1"> 1 &emsp;&emsp;
                    <input type="radio" name="p6" value="2"> 2 &emsp;&emsp;
                    <input type="radio" name="p6" value="3"> 3 &emsp;&emsp;
                    <input type="radio" name="p6" value="4"> 4 &emsp;&emsp;
                    <input type="radio" name="p6" value="5"> 5 
                    <br><br>
                </li>

                <li>
                    <p>Kemajuan teknologi informasi membantu penanganan medis secara dini dimanadapat mencegah terjadinya penyakit jantung iskemik di masa yang akan datang.</p>
                    <input type="radio" name="p7" value="setuju"> Setuju &emsp;&emsp;
                    <input type="radio" name="p7" value="tidaksetuju"> Tidak Setuju
                    <br><br>
                </li>

                <li>
                    <p>Anda pernah mendengar salah satu atau lebih dari satu aplikasi yang membantu dokter dalam melakukan analisis dan diagnosis penyakit.</p>
                    <input type="radio" name="p8" value="ya"> Ya &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="p8" value="tidak"> Tidak
                    <br><br>
                </li>

                <li>
                    <p>Menurut anda, Apakah aplikasi tersebut dapat membantu dokter menemukan ketepatan dalam melakukan analisis dan diagnosis penyakit ?</p>
                    <input type="radio" name="p9" value="ya"> Ya &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="p9" value="tidak"> Tidak
                    <br><br>
                </li>
                <li>
                    <p>Anda pernah mendengar salah satu atau lebih dari satu aplikasi yang dapat membantu penanganan medis sehingga dapat mencegah terjadinya penyakit jantung.</p>
                <input type="radio" name="p10" value="ya"> Ya &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="p10" value="tidak"> Tidak
                    <br><br>
                </li>
                    <li>
                    <p>Menurut anda, Apakah aplikasi tersebut dapat membantu lembaga kesehatan dalam melakukan penanganan medis yang lebih intensif agar mencegah terjadinya penyakit jantung?</p>
                    <input type="radio" name="p11" value="ya"> Ya &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="p11" value="tidak"> Tidak
                    <br><br>
                </li>

                <li>
                    <p>Anda mengetahui bahwa ada beberapa penyakit yang dapat memicu terjadinya penyakit jantung.
                    </p>

                    <input type="radio" name="p12" value="ya"> Ya &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="p12" value="tidak"> Tidak 
                            <br>
                            <b>(Jika menjawab ya pada nomor 8 lanjutkan ke nomor 9-11, jika tidak lewati)</b>
                    <br><br>
                </li>


                <li>
                    <p>Tandai penyakit yang menurut anda dapat mengarah atau menjadi faktor terjadinya penyakit jantung koroner
                        <br>
                        <b>(Berilah angka 1- 4 dari jawaban yang menurut anda paling utama sampai tidak)</b>
                    </p>
                    <table>
                        <tr>
                            <td style="width:50%"><input name="diabetes" type="number" max="4" min="1" style="width:35px;" name="p13"> Diabetes</td>
                            <td><input name="ginjal" type="number" max="4" min="1" style="width:35px;" name="p13"> Ginjal</td>
                        </tr>
                        <tr>
                            <td><input name="hipertensi" type="number" max="4" min="1" style="width:35px;" name="p13"> Hipertensi</td>
                            <td><input name="lemak" type="number" max="4" min="1" style="width:35px;" name="p13"> Lemak/Kolesterol </td>
                        </tr>
                    </table>
                    <br><br>
                </li>


                <li>
                    <p>
                        Tingkat resiko seseorang dapat diukur untuk menentukan beresiko atau tidaknya pasien terkena penyakit jantung berdasarkan pola riwayat pasien terhadap penyakit di atas (No. 12)
                    </p>
                    (No. 12)<br>
                    <input type="radio" name="p14" value="setuju"> Setuju &emsp;&emsp;
                    <input type="radio" name="p14" value="tidaksetuju"> Tidak Setuju
                    <br><br>
                </li>

                <li>
                    <p>
                        Teknologi informasi dapat dibuat untuk mengukur beresiko atau tidaknya pasien berdasarkan penyakit di atas.
                    </p>
                    <input type="radio" name="p15" value="setuju"> Setuju &emsp;&emsp;
                    <input type="radio" name="p15" value="tidaksetuju"> Tidak Setuju
                    <br><br>
                </li>

                <li>
                    <p>Teknologi informasi dapat membantu bahkan berperan penting dalam bidang kesehatan.
                        <br>
                        <b>(Berikan tanda silang pada salah satu nomor pada kotak di bawah ini)</b>
                    </p>
                    <----------------- &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -----------------> <br>
                    Semakin Sering        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Tidak Pernah <br>
                    <input type="radio" name="p16" value="1"> 1 &emsp;&emsp;
                    <input type="radio" name="p16" value="2"> 2 &emsp;&emsp;
                    <input type="radio" name="p16" value="3"> 3 &emsp;&emsp;
                    <input type="radio" name="p16" value="4"> 4 &emsp;&emsp;
                    <input type="radio" name="p16" value="5"> 5 
                    <br><br>
                </li>
                <input class="btn btn-warning" type='reset' name="reset" value="Reset"/>
                <input class="btn btn-primary" type='submit' name="submit" value="Submit Diagnosa"/>
            </ol>
        </form>
        </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Selesai</h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <h1 align="center">Data anda sudah berhasil kami simpan, terima kasih</h1>
                        
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-label="Close">Tutup</button>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<script>
<?php
    if(isset($_POST['submit'])){
        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];
        $p4 = $_POST['p4'];
        $p5 = $_POST['p5'];
        $p6 = $_POST['p6'];
        $p7 = $_POST['p7'];
        $p8 = $_POST['p8'];
        $p9 = $_POST['p9'];
        $p10 = $_POST['p10'];
        $p11 = $_POST['p11'];
        $p12 = $_POST['p12'];
        
        $diabetes = $_POST['diabetes'];
        $ginjal = $_POST['ginjal'];
        $hipertensi = $_POST['hipertensi'];
        $lemak = $_POST['lemak'];
        
        $p14 = $_POST['p14'];
        $p15 = $_POST['p15'];
        $p16 = $_POST['p16'];
        echo "$('#doneModal').modal();";
        
        
    }
?>
</script>

<?php
echo $p1."|".$p2."|".$p3."|".$p4."|".$p5."|".$p6."|".$p7."|".$p8."|".$p9."|".$p10."|".$p11."|".$p12."|".$p14."|".$p15."|".$p16;
echo "<br>".$diabetes."|".$ginjal."|".$hipertensi."|".$lemak;

?>