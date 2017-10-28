
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">List Diagnosa</h3>

              <div class="box-tools">

                <div class="input-group" style="width: 150px;">

                </div>
              </div>
            </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th style="width:5%">No</th>
              <th style="width:30%">Hasil Diagnosa</th>
              <th style="width:10%">Action</th>
            </tr>
            <?php
                $number = 1;
                $diagnosadao = new DiagnosaDao();
                $iterator = $diagnosadao->get_all_diagnosa() ->getIterator();
                while ($iterator -> valid()) 
                {
                    echo "<tr>";
                    echo "<td>".$number."</td>";
                    echo "<td>".$iterator->current()->getHasildiagnosa()."</td>";
                    echo "<td>";
                    echo "<button class='btn btn-danger' onclick='downloadText(\"".$iterator->current()->getHasildiagnosa()."\",\"".$number."result\",\"txt\")'>Download Text</button>";
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
<a id="a" hidden/>
<script>
function downloadText(text, name, type) {
  var a = document.getElementById("a");

  var file = new Blob([text], {type: type});
  a.href = URL.createObjectURL(file);
  a.download = name+".txt";
  a.click();
}
</script>