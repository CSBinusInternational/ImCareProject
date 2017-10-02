<?php
if(isset($_GET['kdpenyakit']))
{
    $kdpenyakit = $_GET['kdpenyakit'];
}
else{
    $kdpenyakit = 0;
}
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">List Video</h3>

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
              <th style="width:30%">Judul Video</th>
              <th style="width:40%">Video</th>
              <th style="width:10%">Action</th>
            </tr>
            <?php
                $number = 1;
                $videodao = new VideoDao();
                $iterator = $videodao->get_video_by_kdpenyakit($kdpenyakit) ->getIterator();
                while ($iterator -> valid()) 
                {
                    echo "<tr>";
                    echo "<td>".$number."</td>";
                    echo "<td>".$iterator->current()->getJudulvideo()."</td>";
                    echo "<td><a href=".$iterator->current()->getUrlvideo().">".$iterator->current()->getUrlvideo()."</a></td>";
                    echo "<td>";
                    echo "<button class='btn btn-danger' onclick='removeVideo(".$iterator->current()->getNovideo().",".$iterator->current()->getKdpenyakit().")'>Hapus</button>";
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