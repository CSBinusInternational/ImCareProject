<?php
if(isset($_POST['tambahrs'])){
    $kdrs = $_POST['kdrs'];//1
    $nmrs = $_POST['nmrs'];//2
    $almt = $_POST['almt'];//3
    $kotars = $_POST['kotars'];//4
    $kdposrs = $_POST['kdposrs'];//5
    $kelurahanrs = $_POST['kelurahanrs'];//6
    $kecamatanrs = $_POST['kecamatanrs'];//7
    $telprs = $_POST['telprs'];//8
    $faxrs = $_POST['faxrs'];//9
    $webrs = $_POST['webrs'];//10
    $humasrs = $_POST['humasrs'];//11
    $longitude = $_POST['longitude'];//12
    $latitude = $_POST['latitude'];//13
    $kdpenyakit = 1;//14
    
    $rs = new Rs();
    $rs ->setKdrs($kdrs);//1
    $rs ->setNmrs($nmrs);//2
    $rs ->setAlmt($almt);//3
    $rs ->setKotars($kotars);//4
    $rs ->setKdposrs($kdposrs);//5
    $rs ->setKelurahanrs($kelurahanrs);//6
    $rs ->setKecamatanrs($kecamatanrs);//7
    $rs ->setTelprs($telprs);//8
    $rs ->setFaxrs($faxrs);//9
    $rs ->setWebrs($webrs);//10
    $rs ->setHumasrs($humasrs);//11
    $rs ->setLongitude($longitude);//12
    $rs ->setLatitude($latitude);//13
    $rs ->setKdpenyakit($kdpenyakit);//14
    
    $rsdao =new RsDao();
    $rsdao->insert_rs($rs);
    
    echo "<script>alert('data rumah sakit berhasil ditambahkan');</script>";
    
}
?>

<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-primary" data-toggle='modal' style="margin:5px" onclick="showAddRs()">Tambah Info Rumah Sakit</button>
        <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Informasi Rumah Sakit</h3>

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
                $rsdao = new RsDao();
                $iterator = $rsdao->get_all_rs()->getIterator();
                while ($iterator -> valid()) 
                {
                    echo "<tr>";
                    echo "<td>".$number."</td>";
                    echo "<td>".$iterator->current()->getNmrs()."</td>";
                    echo "<td>".$iterator->current()->getAlmt()."</td>";
                    echo "<td>".$iterator->current()->getKotars()."</td>";
                    echo "<td>".$iterator->current()->getTelprs()."</td>";
                    echo "<td>".$iterator->current()->getFaxrs()."</td>";
                    echo "<td>";
                    echo "<button class='btn btn-info'>Detail</button>";
                    echo "<button class='btn btn-danger'>Hapus</button>";
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
		<h4 class="modal-title" id="myModalLabel">Tambah Rumah Sakit</h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <input name="kdrs" type="text" class="form-control" placeholder="Kode Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="nmrs" type="text" class="form-control" placeholder="Nama Rumah Sakit" style="margin-bottom: 10px" required>
                        <textarea name="almt" placeholder="Alamat Rumah Sakit" class="form-control" style="margin-bottom: 10px" required></textarea>
                        <input name="kotars" type="text" class="form-control" placeholder="Kota Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="kdposrs" type="text" class="form-control" placeholder="Kode pos Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="kelurahanrs" type="text" class="form-control" placeholder="Kelurahan Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="kecamatanrs" type="text" class="form-control" placeholder="Kecamatan Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="telprs" type="text" class="form-control" placeholder="Telepon Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="faxrs" type="text" class="form-control" placeholder="Fax Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="webrs" type="text" class="form-control" placeholder="Website Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="humasrs" type="text" class="form-control" placeholder="Humas Rumah Sakit" style="margin-bottom: 10px" required>
                        
                        <input name="longitude" type="text" class="form-control" placeholder="Longitude Rumah Sakit" style="margin-bottom: 10px" required>
                        <input name="latitude" type="text" class="form-control" placeholder="Latitude Rumah Sakit" style="margin-bottom: 10px" required>
                        
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