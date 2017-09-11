
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
        
        if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
            $name = $_FILES["gambar"]["name"];
            $ext = (explode(".", $name)); 
            $ext = end($ext);
            
            $penyakitdao = new PenyakitDao();
            $kdpenyakit = $penyakitdao->insert_penyakit($penyakit);
            
            $path = "images/".$kdpenyakit.".".$ext;
            $urlgambar = "https://imcare.000webhostapp.com/".$path;
            $penyakitdao->update_url($urlgambar, $kdpenyakit);
            move_uploaded_file ($_FILES['gambar'] ['tmp_name'], $path);
        }
        
        echo "<script>alert('data penyakit berhasil ditambahkan');</script>";
        //echo "alert('Kode Penyakit = '+$kdpenyakit);";
        //echo $nmpenyakit." ".$despenyakit." ".$fketurunan." ".$kronis." ".$menular;
    }
    
    if(isset($_POST['tambahvideo'])){
        $judulvideo = $_POST['judulvideo'];
        $kdpenyakit = $_POST['kdpenyakit'];
        
      
        
        if (is_uploaded_file($_FILES['video']['tmp_name']))
        {
            $name = $_FILES["video"]["name"];
            $ext = (explode(".", $name)); 
            $ext = end($ext);
            $video = new Video();
            $video->setKdpenyakit($kdpenyakit);
            $video->setJudulvideo($judulvideo);
            $video->setUrlvideo("");
            
            $videodao = new VideoDao();
            $novideo = $videodao->insert_video($video);
            $path = "videos/".$novideo.".".$ext;
            $urlvideo = "https://imcare.000webhostapp.com/".$path;
            $videodao->update_url($urlvideo, $novideo);
            move_uploaded_file ($_FILES['video'] ['tmp_name'], $path);
            
            echo "<script>alert('video sukses terupload');</script>";
        }
        else{
            echo "<script>alert('mohon pilih file untuk di upload');</script>";
        }
    }
    
    if(isset($_POST['editpenyakit'])){
        $kdpenyakit = $_POST['kdpenyakit'];
        $nmpenyakit = $_POST['nmpenyakit'];
        $despenyakit = $_POST['despenyakit'];
        $fketurunan = $_POST['fketurunan'];
        $kronis = $_POST['kronis'];
        $menular = $_POST['menular'];
        $penyakitdao = new PenyakitDao();
        
          $penyakit = new Penyakit();
        $penyakit->setKdpenyakit($kdpenyakit);
        $penyakit->setNmpenyakit($nmpenyakit);
        $penyakit->setDespenyakit($despenyakit);
        $penyakit->setFketurunan($fketurunan);
        $penyakit->setKronis($kronis);
        $penyakit->setMenular($menular);
        
        if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
            $name = $_FILES["gambar"]["name"];
            $ext = (explode(".", $name)); 
            $ext = end($ext);
            
            
            $path = "images/".$kdpenyakit.".".$ext;
            $urlgambar = "https://imcare.000webhostapp.com/".$path;
            $penyakitdao->update_url($urlgambar, $kdpenyakit);
            move_uploaded_file ($_FILES['gambar'] ['tmp_name'], $path);
        }
        
        $penyakitdao->update_penyakit($penyakit);
        echo "<script>alert('data penyakit berhasil disimpan');</script>";
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
              <th style="width:15%">Penyakit</th>
              <th style="width:25%">Deskripsi</th>
              <th style="width:5%">Keturunan</th>
              <th style="width:5%">Menular</th>
              <th style="width:5%">Kronis</th>
              <th style="width:25%">Action</th>
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
                    echo 
                     "<td>"
                    . "<button class='btn btn-danger' style='margin:5px;' onclick='showEditInfo(\"".$iterator->current()->getKdpenyakit()."\",\"".$iterator->current()->getNmpenyakit()."\",\"".$iterator->current()->getDespenyakit()."\",\"".$iterator->current()->getFketurunan()."\",\"".$iterator->current()->getMenular()."\",\"".$iterator->current()->getKronis()."\")'>Edit</button>"
                    . "<button class='btn btn-success' style='margin:5px;' onclick='showAddVideo(\"".$iterator->current()->getKdpenyakit()."\")'>Video</button>"
                    . "<button class='btn btn-warning' style='margin:5px;' onclick='showAddArtikel(\"".$iterator->current()->getKdpenyakit()."\")'>Artikel</button>"
                    . "</td>";
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

function showAddVideo(kdpenyakit)
{
    $("#addVideoModal .kdpenyakit").val(kdpenyakit);
    $('#addVideoModal').modal();
}

function showAddArtikel(kdpenyakit)
{
    $("#addArtikelModal .kdpenyakit").val(kdpenyakit);
    $('#addArtikelModal').modal();
}

function showEditInfo(kdpenyakit,nmpenyakit,despenyakit,fketurunan,menular,kronis)
{
    $("#editInfoModal .kdpenyakit").val(kdpenyakit);
    $("#editInfoModal .nmpenyakit").val(nmpenyakit);
    $("#editInfoModal .despenyakit").val(despenyakit);

    $('#editInfoModal').modal();
}

function gotolistvideo(){
    var kdpenyakit = document.getElementById("kdpenyakitvideo").value;
    //alert(kdpenyakit);
    window.location='index.php?page=videolist&kdpenyakit='+kdpenyakit;
}

function gotolistartikel(){
    var kdpenyakit = document.getElementById("kdpenyakitartikel").value;
    //alert(kdpenyakit);
    window.location='index.php?page=artikellist&kdpenyakit='+kdpenyakit;
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
                        <input name="gambar" type="file" class="form-control" style="margin-bottom: 10px"/>  
                         
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


<div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Tambah Video</h4>
	  </div>
            
            
        <div class="modal-body">
            <button class="btn btn-info" onclick="gotolistvideo()">Lihat Daftar Video</button><br><br>
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        
                        
                        <input name="kdpenyakit" type="hidden" class="kdpenyakit" id="kdpenyakitvideo"/>
                        
                        <input name="judulvideo" type="text" class="form-control" placeholder="Judul Video" style="margin-bottom: 10px" required>
                        
                        Video (.mp4/.3gp)
                        <input name="video" type="file" class="form-control" style="margin-bottom: 10px"/>  
                       
                        <input type="submit" name="tambahvideo" class="btn btn-primary" value="Tambah Video">
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

<div class="modal fade" id="addArtikelModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Tambah Artikel</h4>
	  </div>
            
            
        <div class="modal-body">
            <button class="btn btn-info" onclick="gotolistartikel()">Lihat Daftar Artikel</button><br><br>
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        
                        <input type="hidden" class="kdpenyakit" id="kdpenyakitartikel"/>
                         <input name="nmartikel" type="text" class="form-control" placeholder="Nama Artikel" style="margin-bottom: 10px" required>
                   
                    
                        <input type="submit" name="tambahartikel" class="btn btn-primary" value="Tambah Artikel">
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


<div class="modal fade" id="editInfoModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Ubah Informasi Penyakit</h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        
                        <input name="kdpenyakit" type="hidden" class="kdpenyakit"/>
                        <input name="nmpenyakit" type="text" class="nmpenyakit form-control" placeholder="Nama Penyakit" style="margin-bottom: 10px" required>
                        
                        <textarea name="despenyakit" placeholder="Deskripsi Penyakit" class="despenyakit form-control" style="margin-bottom: 10px" required></textarea>
                        
                        Gambar (.jpg/.png)
                        <input name="gambar"type="file" class="form-control" style="margin-bottom: 10px"/>  
                         
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
                        <input type="submit" name="editpenyakit" class="btn btn-primary" value="Ubah Penyakit">
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