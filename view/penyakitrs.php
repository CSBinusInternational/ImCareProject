<?php
$kdpenyakit = "";
if(isset($_GET['kdpenyakit']))
{
    $kdpenyakit = $_GET['kdpenyakit'];
    $penyakitdao = new PenyakitDao();
    $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
}
$rsdao = new RsDao();
if(isset($_POST['tambahrs'])){
    
    if(isset($_POST['idrs']))
    {
        $idrs = $_POST['idrs'];       
        $rsdao->insert_rs_penyakit($idrs, $kdpenyakit);
        echo "<script>alert('data rumah sakit berhasil ditambahkan');</script>";
    }else{
        echo "<script>alert('mohon pilih rumah sakit');</script>";
    }
    
}
?>
<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-primary" data-toggle='modal' style="margin:5px" onclick="showAddRs()">Tambah Info Rumah Sakit</button>
        <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Informasi Rumah Sakit <?php echo $penyakit->getNmpenyakit();?></h3>

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
              <th style="width:15%">Nama Rumah Sakit</th>
              <th style="width:25%">Alamat</th>
              <th style="width:10%">Kota</th>
              <th style="width:10%">Telepon</th>
              <th style="width:10%">Fax</th>
              <th style="width:15%">Action</th>
            </tr>
            <?php
                $number = 1;
                
                $iterator = $rsdao->get_rs_kdpenyakit($kdpenyakit)->getIterator();
                while ($iterator -> valid()) 
                {
                    $idrs = $iterator->current()->getIdrs();
                    $kdrs = $iterator->current()->getKdrs();
                    $nmrs = $iterator->current()->getNmrs();
                    $almt = $iterator->current()->getAlmt();
                    $kotars = $iterator->current()->getKotars();
                    $kdposrs = $iterator->current()->getKdposrs();
                    $kelurahanrs = $iterator->current()->getKelurahanrs();
                    $kecamatanrs = $iterator->current()->getKecamatanrs();
                    $telprs = $iterator->current()->getTelprs();
                    $faxrs = $iterator->current()->getFaxrs();
                    $webrs = $iterator->current()->getWebrs();
                    $humasrs = $iterator->current()->getHumasrs();
                    $latitude = $iterator->current()->getLatitude();
                    $longitude = $iterator->current()->getLongitude();
                    
                    echo "<tr>";
                    echo "<td>".$number."</td>";
                    echo "<td>".$nmrs."</td>";
                    echo "<td>".$almt."</td>";
                    echo "<td>".$kotars."</td>";
                    echo "<td>".$telprs."</td>";
                    echo "<td>".$faxrs."</td>";
                    echo "<td>";
                    echo "<button class='btn btn-info' onclick='detailRumahSakitModal(\"".$kdrs."\",\"".$nmrs."\",\"".$almt."\",\"".$kotars."\",\"".$kdposrs."\",\"".$kelurahanrs."\",\"".$kecamatanrs."\",\"".$telprs."\",\"".$faxrs."\",\"".$webrs."\",\"".$humasrs."\",\"".$latitude."\",\"".$longitude."\")'>Detail</button>";
                    echo "<button class='btn btn-danger' onclick='removeRs(".$idrs.")'>Hapus</button>";
                    echo "</td>";
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
    function showAddRs()
    {
        $('#addRsModal').modal();
    }
</script>

<div class="modal fade" id="addRsModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Tambah Rumah Sakit <?php echo $penyakit->getNmpenyakit() ?></h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        
                        <select name="idrs">
                            <option disabled selected>Pilih Rumah Sakit</option>
                            <?php
                            $iterator = $rsdao->get_all_rs_no_penyakit($kdpenyakit)->getIterator();
                            while ($iterator -> valid()) 
                            {
                                echo "<option value='".$iterator->current()->getIdrs()."'>".$iterator->current()->getNmrs()."</option>";
                                $iterator->next();
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        
                        
                        <input type="submit" name="tambahrs" class="btn btn-primary" value="Tambah Rumah Sakit">
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

