<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>
  
  <div class="page-header">
    <h1>
      Derajat Kecanggihan
    </h1>
  </div><!-- /.page-header -->

<div class="col-xs-12">

                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>

                        <tr class="center">
                          <th style="width: 4%" rowspan="2" class="center"><label class="pos-rel">No</label></th>
                          <th style="width: 20%" rowspan="2" class="center">Komponen</th>
                          <th style="width: 20%" rowspan="2" class="center">Proses Bisnis</th>
                          <th style="width: 8%" colspan="2" class="center">Perusahaan yang diukur</th>
                          <th style="width: 8%" colspan="2" class="center">Perusahaan Referensi</th>
                        </tr>

                        <tr class="center">
                          <th style="width: 8%" class="center">Nilai</th>
                          <th style="width: 20%" class="center">Kategori</th>
                          <th style="width: 8%" class="center">Nilai</th>
                          <th style="width: 20%" class="center">Kategori</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        if (empty($dk2) | in_array("0", $dk2) | empty($dk) | in_array("0", $dk)) {
                          echo "<td colspan='7'><font color='red'>Masih ada nilai kosong</font></td>";
                        } else {

                        foreach ($dk2 as $row2) {
                          $quiz[]     = $row2->quiz;
                          $derajat[]  = $row2->derajat;
                        }

                          $i=-1; $no=0;
                        foreach ($dk as $row) {
                          $no++;
                          $i++;

                          /*$color=($no % 2 == 0) ? "whitesmoke" : "grey";

                          echo "<tr bgcolor=$color class='center'>
                                  <td class='center'>$no</td>
                                  <td class='center'>";*/

                          echo "<tr class='center'>
                                  <td class='center'>$no</td>
                                  <td class='center'>";

                                  if ($row->komponen == 1) {
                                    echo "Technoware";
                                  } else if ($row->komponen == 2) {
                                    echo "Humanware 1";
                                  } else if ($row->komponen == 3) {
                                    echo "Humanware 2";
                                  } else if ($row->komponen == 4) {
                                    echo "Infoware";
                                  } else if ($row->komponen == 5) {
                                    echo "Orgaware";
                                  } 

                            echo "</td>
                                  <td>$row->category</td>
                                  <td>$row->quiz</td>
                                  <td>$row->derajat</td>
                                  <td>".$quiz[$i]."</td>
                                  <td>".$derajat[$i]."</td>";
                         }
                       }
                        ?>
                      
                      </tbody>
                    </table>
                  </div><!-- /.span -->
                </div><!-- /.row -->
              </div>

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php $this->load->view("part/footer");?>
