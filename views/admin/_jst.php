<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>
  
  <div class="page-header">
    <h1>
      Justifikasi Investasi
    </h1>
  </div><!-- /.page-header -->
  <?php echo $this->session->flashdata('report');?>

<div class="col-xs-12">

                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                       <thead>

                        <tr class="center">
                          <th class="center"><label class="pos-rel">No</label></th>
                          <th style="width: 15%" class="center">Komponen</th>
                          <th style="width: 15%" class="center">Proses Bisnis</th>
                          <th style="width: 20%" colspan="2" class="center">Perusahaan diukur</th>
                          <th style="width: 20%" colspan="2" class="center">Perusahaan Referensi</th>
                          <th style="width: 15%" class="center">Selisih</th>
                          <th style="width: 15%" class="center">Keputusan</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        if (empty($js2) | in_array("0", $js1)) {
                          echo "<td colspan='7'><font color='red'>Masih ada nilai kosong</font></td>";
                        } else {

                        foreach ($js2 as $row2) {
                          $quiz[]           = $row2->quiz;
                          $id_perusahaan[]  = $row2->id_perusahaan;
                          $id_question[]    = $row2->id_question;
                        }
                        $i=-1; $no=0;
                        foreach ($js1 as $row) {
                          $no++;
                          $i++;
                          $exp = 0.25;

                          if ((((round(pow($row->quiz, $exp),3))-(round(pow($quiz[$i], $exp),3)))) >= 0) {
                            $color = "green";
                          } else {
                            $color = "red";
                          }

                          echo "<tr style=\"color:$color\" class='center'><font color='$color'></font>
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

                                  $ajax_url1 = "".base_url('admin/get_observasi/')."".$row->id_perusahaan."/".$row->id_question."";
                                  $ajax_url2 = "".base_url('admin/get_observasi/')."".$id_perusahaan[$i]."/".$id_question[$i]."";
                            echo "</td>
                                    <td>$row->category</td>
                                    
                                    <td>".round(pow($row->quiz, $exp),3)."</td>
                                    <td><a class=\"$color\" href='javascript:void(0)'  onclick=\"observasi1('$ajax_url1')\"><i class=\"ace-icon fa fa-check-square bigger-130\" title=\"Verifikasi\"></i></a></td>
                                    
                                    <td>".round(pow($quiz[$i], $exp),3)."</td>
                                    <td><a class=\"$color\" href='javascript:void(0)'  onclick=\"observasi2('$ajax_url2')\"><i class=\"ace-icon fa fa-check-square bigger-130\" title=\"Verifikasi\"></i></a></td>
                                    
                                    <td>".((round(pow($row->quiz, $exp),3))-(round(pow($quiz[$i], $exp),3)))."</td>
                                    <td>";
                                    if ((((round(pow($row->quiz, $exp),3))-(round(pow($quiz[$i], $exp),3)))) >= 0) {
                                        echo "Tidak Perlu Investasi";
                                      } else {
                                        echo "Perlu Investasi";
                                      }
                                    echo "</td>
                                    </tr>";
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


<script type="text/javascript">
  
  function observasi1(ajax_url1){  

    //Ajax Load data from ajax
    $.ajax({
        url : ajax_url1,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_perusahaan"]').val(data.id_perusahaan);
            $('[name="id_question"]').val(data.id_question);
            $('[name="nama_perusahaan"]').val(data.nama_perusahaan);
            $('[name="observasi"]').val(data.observasi);
            $('#modal_observasi').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Data Observasi Perusahaan Diukur'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax server');
        }
    });
  }  

  function observasi2(ajax_url2){  

    //Ajax Load data from ajax
    $.ajax({
        url : ajax_url2,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_perusahaan"]').val(data.id_perusahaan);
            $('[name="id_question"]').val(data.id_question);
            $('[name="nama_perusahaan"]').val(data.nama_perusahaan);
            $('[name="observasi"]').val(data.observasi);
            $('#modal_observasi').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Data Observasi Perusahaan Referensi'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax server');
        }
    });
  }
</script>

<!--OBSERVASI-->
<div class="modal fade" id="modal_observasi" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 id="title" class="modal-title"></h3>
            </div>
                <form action="<?php if (isset($row->observasi) || isset($row->quiz)) {echo base_URL()."user/update_o_admin/"; } else {echo base_URL()."user/add_o/";}?>" class="form-horizontal" method="post">
                  <div class="modal-body form">
                    <div class="form-body">

                      <!--Perusahaan diukur-->
                        <input name="id_perusahaan" readonly class="form-control" type="hidden">
                        <input name="id_question" readonly  class="form-control" type="hidden">

                        <div class="form-group">
                            <label class="control-label col-md-4">Nama Perusahaan</label>
                            <div class="col-md-8">
                                <input name="nama_perusahaan" readonly  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Observasi</label>
                            <div class="col-md-8">
                              <textarea class="form-control" name="observasi" rows="5"></textarea>
                            </div>
                        </div>

                    </div>
                  </div>

            <div class="modal-footer">
              <input type="submit" class="btn btn-info" value="Simpan" name="save">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </form>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END of OBSERVASI-->

