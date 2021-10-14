<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>

<div class="page-header">
    <h1><?php echo $page; ?></h1>
</div>
<!-- /.page-header -->
<?php echo $this->session->flashdata('sucess_report');?>
<?php $this->session->set_userdata('referred_task', current_url());?>
          
          <!--<body onload="return alert('This task is unapprovable...')"></body>-->
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                <div class="row">
                  <div class="col-xs-12">
                    <div class="clearfix">
                      <div class="pull-right tableTools-container">

                        <div class="dt-buttons btn-overlap btn-group">
                          <a class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold" href="javascript:history.back()"><span><i class="fa fa-reply-all bigger-110 orange"></i> <span class="hidden">Back</span></span></a>
                        </div>

                      </div>

                    </div>
                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th>
                            <th style="width: 3%" class="center">No</th>                          
                            <th style="width: 14%">Identitas</th>                          
                            <th style="width: 14%">Order</th>                          
                            <th style="width: 14%">Timbang</th>                          
                            <th style="width: 14%">Sortir</th>                          
                            <th style="width: 14%">Kemas</th>                          
                            <th style="width: 14%">Simpan</th>                          
                            <th style="width: 13%">Kirim</th>
                          </tr>
                        </thead>

                        <tbody>
                  <?php
                    if(empty($perusahaan)){
                      echo "<td colspan='6'>Belum ada data...</td>";
                    } else{
                      $no=0;
                      foreach ($perusahaan as $row) {
                        $no++;
                        echo "<tr><td class=\"center\"><label class=\"pos-rel\"><input type=\"checkbox\" class=\"ace\" /><span class=\"lbl\"></span></label></td>";
                        
                        echo "<td>$no</td>";
                        echo "<td style=\"font-size:70%;\">Nama : $row->nama <br>$row->no_hp <br>$row->email <br>$row->nama_perusahaan <br>$row->jabatan</td>";

                        echo "<td style=\"font-size:80%;\">
                        Order 1 : $row->order_1<br>
                        Order 2 : $row->order_2<br>
                        Order 3 : $row->order_3<br>
                        Order 4 : $row->order_4<br>
                        </td>

                        <td style=\"font-size:80%;\">                      
                        Timbang 1 : $row->timbang_1<br>
                        Timbang 2 : $row->timbang_2<br>
                        Timbang 3 : $row->timbang_3<br>
                        Timbang 4 : $row->timbang_4<br>
                        Timbang 5 : $row->timbang_5<br>
                        </td>

                        <td style=\"font-size:80%;\">
                        Sortir 1 : $row->sortir_1<br>
                        Sortir 2 : $row->sortir_2<br>
                        Sortir 3 : $row->sortir_3<br>
                        Sortir 4 : $row->sortir_4<br>
                        Sortir 5 : $row->sortir_5<br>
                        </td>

                        <td style=\"font-size:80%;\">
                        Kemas 1 : $row->kemas_1<br>
                        Kemas 2 : $row->kemas_2<br>
                        Kemas 3 : $row->kemas_3<br>
                        Kemas 4 : $row->kemas_4<br>
                        Kemas 5 : $row->kemas_5<br>
                        </td>

                        <td style=\"font-size:80%;\">
                        Simpan 1 : $row->simpan_1<br>
                        Simpan 2 : $row->simpan_2<br>
                        Simpan 3 : $row->simpan_3<br>
                        Simpan 4 : $row->simpan_4<br>
                        Simpan 5 : $row->simpan_5<br>
                        </td>
                        
                        <td style=\"font-size:80%;\">
                        Kirim 1 : $row->kirim_1<br>
                        Kirim 2 : $row->kirim_2<br>
                        Kirim 3 : $row->kirim_3<br>
                        Kirim 4 : $row->kirim_4<br>
                        Kirim 5 : $row->kirim_5<br>
                        </td>";
                      }} ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">Ace</span>
              Application &copy; 2013-2014
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url()?>assets/admin/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?php echo base_url()?>assets/admin/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url()?>assets/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url()?>assets/admin/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="<?php echo base_url()?>assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/dataTables.select.min.js"></script>

    <!-- ace scripts -->
    <script src="<?php echo base_url()?>assets/admin/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/ace.min.js"></script>

    <script type="text/javascript">
  
  function done(id_perusahaan){  

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('project/ajax_done')?>/" + id_perusahaan,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_perusahaan"]').val(data.id_perusahaan);
            $('[name="task_name"]').val(data.task_name);
            $('[name="finished"]').val(data.finished);
            $('[name="status"]').val(data.status);
            $('#modal_done').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Set Finished'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax server');
        }
    });
  }
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false },{ "bSortable": false }, { "bSortable": false }, { "bSortable": false },{ "bSortable": false }],
          "aaSorting": [],

      
          select: {
            style: 'multi'
          }
          } );


        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
          buttons: [
            {
            "extend": "copy",
            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
            }   
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );
        
        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
          defaultCopyAction(e, dt, button, config);
          $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });
        
        
        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {
          
          defaultColvisAction(e, dt, button, config);
          
          
          if($('.dt-button-collection > .dropdown-menu').length == 0) {
            $('.dt-button-collection')
            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
            .find('a').attr('href', '#').wrap("<li />")
          }
          $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });
      
        ////
      
        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);
        
        myTable.on( 'select', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
          }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
          }
        } );
      
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        
        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $('#dynamic-table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });
      
      
      
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });
        

        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if($row.is('.detail-row ')) return;
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });
      
        
      
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
        

        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
      
      })
    </script>


<!--DONE-->
  <div class="modal fade" id="modal_done" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
                <form action="<?php echo base_url('/project/act_ajax_done/');?>" class="form-horizontal" method="post">
                  <div class="modal-body form">
                    <div class="form-body">
                      <input type="hidden"  name="id_perusahaan"/> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Task Name</label>
                            <div class="col-md-9">
                                <input name="task_name" readonly class="form-control" value="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Finished Date</label>
                            <div class="col-md-4">
                                <input name="finished" class="form-control" type="date">
                            </div>
                        </div>
                    </div>
                  </div>

            <div class="modal-footer">
                          <input type="submit" class="btn btn-info" value="Set Finished" name="save">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                </form>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END of DONE-->

<!--EDIT-->
  <div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
                <form action="<?php echo base_url('/project/act_ajax_edit/');?>" class="form-horizontal" method="post">
                  <div class="modal-body form">
                    <div class="form-body">
                      <input type="hidden"  name="id_perusahaan"/> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Task Name</label>
                            <div class="col-md-9">
                                <input name="task_name" class="form-control" value="" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Finished Date</label>
                            <div class="col-md-4">
                                <input name="finished" class="form-control" type="date">
                            </div>
                        </div>
                    </div>
                  </div>

            <div class="modal-footer">
                          <input type="submit" class="btn btn-info" value="Set Finished" name="save">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                </form>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END of EDIT-->

  </body>
</html>
