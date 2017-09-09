
<?php
    if(isset($_POST['tambahpenyakit'])){
        //input penyakit
        //$gambar_url = $_POST['gambar_url'];
        //$video_url = $_POST['video_url'];
        $nmpenyakit = $_POST['nmpenyakit'];
        $despenyakit = $_POST['despenyakit'];
        $fketurunan = $_POST['fketurunan'];
        $kronis = $_POST['kronis'];
        $menular = $_POST['menular'];
        
        $penyakit = new Penyakit();
        $penyakit->setNmpenyakit($nmpenyakit);
        $penyakit->setDespenyakit($despenyakit);
        $penyakit->setFketurunan($fketurunan);
        $penyakit->setKronis($kronis);
        $penyakit->setMenular($menular);
        $penyakit->setImage_url("https://imcare.000webhostapp.com/images/1.png");
        $penyakit->setVideo_url("https://imcare.000webhostapp.com/videos/cancer.mp4");
        
        $penyakitdao = new PenyakitDao();
        $kdpenyakit = $penyakitdao->insert_penyakit($penyakit);
        
        //echo "alert('Kode Penyakit = '+$kdpenyakit);";
        //echo $nmpenyakit." ".$despenyakit." ".$fketurunan." ".$kronis." ".$menular;
    }
?>


<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-primary" data-toggle='modal' style="margin:5px" onclick="showModal()">Tambah Penyakit</button>
        <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Informasi Penyakit</h3>

              <div class="box-tools">

                <div class="input-group" style="width: 150px;">

                  <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                  
                  <div class="input-group-btn">
                      <button class="btn btn-sm btn-default" ><i class="fa fa-search"></i></button>
                    
                  </div>
                </div>
              </div>
            </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th style="width:5%">No</th>
              <th style="width:25%">Penyakit</th>
              <th style="width:35%">Deskripsi</th>
              <th style="width:10%">Keturunan</th>
              <th style="width:10%">Menular</th>
              <th style="width:10%">Kronis</th>
            </tr>
            <?php
                $number = 1;
                $iterator = $penyakitdao->get_all_penyakit() ->getIterator();
                while ($iterator -> valid()) 
                {
                    echo "<tr>";
                    echo "<td>".$number."</td>";
                    echo "<td>".$iterator->current()->getNmpenyakit()."</td>";
                    echo "<td>".$iterator->current()->getDespenyakit()."</td>";
                    echo "<td>".$iterator->current()->getFketurunan()."</td>";
                    echo "<td>".$iterator->current()->getMenular()."</td>";
                    echo "<td>".$iterator->current()->getKronis()."</td>";
                    echo "</tr>";
                    $number++;
                    $iterator->next();
                }
            ?>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    
</div>
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
function showModal()
{
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
//    $("#timeTableModal .slotjadwalid").val(slotjadwalid)
//    $("#timeTableModal .hari").val(hari)
//    $("#timeTableModal .modal-title").html("Pilih Jadwal untuk "+hari+" pukul "+time)
    $("#timeTableModal").modal();
}
</script>

<div class="modal fade" id="timeTableModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Tambah Penyakit</h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                         <input name="nmpenyakit" type="text" class="form-control" placeholder="Nama Penyakit" style="margin-bottom: 10px" required>
                        
                        <textarea name="despenyakit" placeholder="Deskripsi Penyakit" class="form-control" style="margin-bottom: 10px" required></textarea>
                        
                        Gambar (.jpg/.png)
                        <input name="gambar_url"type="file" class="form-control" style="margin-bottom: 10px"/>  
                        
                        Video (.mp4/.3gp)
                        <input name="video_url" type="file" class="form-control" style="margin-bottom: 10px"/>  
                       
                       
                        
                        <div class="col-md-offset-3">
                        Faktor Keturunan <br>
                        <input type="radio" name="fketurunan" checked="checked" class="radio-inline" value="01"/>Ya<input type="radio" name="fketurunan" class="radio-inline" value="00"/>Tidak
                        <br>
                        <br>
                        Menular <br>
                        <input type="radio" name="menular" checked="checked" class="radio-inline" value="01"/>Ya<input type="radio" name="menular" class="radio-inline" value="00"/>Tidak
                        <br>
                        <br>
                        Kronis <br>
                        <input type="radio" name="kronis" checked="checked" class="radio-inline" value="01"/>Ya<input type="radio" name="kronis" class="radio-inline" value="00"/>Tidak
                        <br>
                        <br>
                        </div>
                        <input type="submit" name="tambahpenyakit" class="btn btn-primary" value="Tambah Penyakit">
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

