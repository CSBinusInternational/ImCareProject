<div class="row">
    <div class="col-xs-12">
        <button class="btn btn-primary" data-toggle='modal' style="margin:5px" onclick="showModal()">Tambah Penyakit</button>
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
              <th style="width:15%">Penyakit</th>
              <th style="width:45%">Action</th>
            </tr>
            <?php
                $number = 1;
                $iterator = $penyakitdao->get_all_penyakit() ->getIterator();
                while ($iterator -> valid()) 
                {
                    echo "<tr>";
                    echo "<td>".$number."</td>";
                    echo "<td>".$iterator->current()->getNmpenyakit()."</td>";
                    echo 
                     "<td>"
                    . "<a class='btn btn-danger' style='margin:5px; width:99%;' href=index.php?page=penyakitrs&kdpenyakit=".$iterator->current()->getKdpenyakit().">Informasi Daftar Rumah Sakit</button>"
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