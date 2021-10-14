<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>

<div class="page-header">
    <h1><?php echo $page; ?></h1>
</div>

<?php echo $this->session->flashdata('report');?>
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
                            <a class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold" href="javascript:history.back()"><span><i class="fa fa-reply-all bigger-110 orange"></i> <span class="hidden">Kembali</span></span></a>
                            <a class="dt-button buttons-copy buttons-html5 btn btn-white btn-primary btn-bold" data-toggle="modal" href="#modal_add"><span><i class="fa fa-plus bigger-110 green"></i><span class="hidden">Tambah Pengguna baru</span></span></a>
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
                              <th style="width: 3%">No</th>                          
                              <th style="width: 20%">Username</th>
                              <th style="width: 22%">Perusahaan</th>
                              <th style="width: 30%">Identitas</th>
                              <th style="width: 15%">Status</th>
                              <th style="width: 10%"></th>
                            </tr>
                          </thead>

                          <tbody>
                    <?php
                      if(empty($users)){
                        echo "<td colspan='6'>Belum ada data...</td>";
                      } else{
                        $no=0;
                        foreach ($users as $row) {
                          $no++;

                          echo "<tr><td class=\"center\"><label class=\"pos-rel\"><input type=\"checkbox\" class=\"ace\" /><span class=\"lbl\"></span></label></td>";
                          echo "<td>$no</td>";
                          echo "<td>$row->username</td>";
                          echo "<td>$row->nama_perusahaan <br>$row->jabatan</td>";
                          echo "<td>$row->nama <br>$row->email <br>$row->no_hp</td>";

                          $status = $row->status;
                          if ($status == 1) {
                            echo "<td><span class='label label-lg label-success'><i class='ace-icon fa fa-check'></i> Aktif</span></td>";
                          } elseif ($status == 0){
                            echo "<td><span class='label label-lg label-danger'><i class='ace-icon fa fa-close'></i> Tidak Aktif</span></td>";
                          }
                
                          echo "<td><div class='action-buttons'><a class='pink' href='#'><i class=\"ace-icon fa fa-list-alt bigger-130\" title=\"Insert\"></i></a>";
                          if ($status == 0) {
                            echo "<a class='green' href='".base_url()."admin/aktif_user/$row->id_user' onclick=\"return confirm('Switch user to Active?...')\"><i class=\"ace-icon fa fa-check bigger-130\" title=\"Set Active\"></i></a>";
                          } elseif ($status == 1) {
                            echo "<a class='orange' href='".base_url()."admin/nonaktif_user/$row->id_user' onclick=\"return confirm('Switch user to Inactive?...')\"><i class=\"ace-icon fa fa-user-times bigger-130\" title=\"Set Inactive\"></i></a>";
                          }

                          echo "<a class='blue' href='javascript:void(0)' onclick=\"edit('$row->id_user')\"><i class=\"ace-icon fa fa-pencil-square bigger-130\" title=\"Edit\"></i></a>
                                <a class='red' href='".base_url()."admin/del/$row->id_user' onclick=\"return confirm('Are You sure to delete this task?')\"><i class=\"ace-icon fa fa-trash bigger-130\" title=\"Delete\"></i></a></div></td>";
                        
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
              <span class="blue bolder">Quitrac</span> &copy; 2018
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

  function edit(id_user){  

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('admin/ajax_user')?>/" + id_user,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_user"]').val(data.id_user);
            $('[name="id_perusahaan"]').val(data.id_perusahaan);
            $('[name="nama_perusahaan"]').val(data.nama_perusahaan);
            $('[name="username"]').val(data.username);
            $('[name="nama"]').val(data.nama);
            $('[name="no_hp"]').val(data.no_hp);
            $('[name="email"]').val(data.email);
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="status"]').val(data.status);
            $('#modal_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
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
          "aoColumns": [{ "bSortable": false },{ "bSortable": false }, { "bSortable": false },{ "bSortable": false }, { "bSortable": false }, { "bSortable": true },{ "bSortable": false }],
          "aaSorting": [],

      
          select: {
            style: 'multi'
          }
          } );


        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
          buttons: [
            {
            "extend": "colvis",
            "text": "<i class='fa fa-filter bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
            "className": "btn btn-white btn-primary btn-bold",
            columns: ':not(:first):not(:last)'
            },
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
            },
            {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: false,
            message: 'This print was produced using the Print button for DataTables'
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


<!--ADD-->
<div class="modal fade" id="modal_add" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Pengguna Baru</h3>
      </div>
      <form action="<?php echo base_url('/admin/add_user/');?>" class="form-horizontal" method="post">
        <div class="modal-body form">
          <div class="form-body">
            
            <div class="form-group">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-4">
                <input name="username" class="form-control" placeholder="Tidak boleh ada spasi" value="" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-6">
                <input name="nama" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Nomor HP</label>
              <div class="col-md-4">
                <input name="no_hp" class="form-control" type="number">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-6">
                <input name="email" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-4">
                <input name="password" class="form-control" placeholder="Type password here" type="password">
              </div>
              <div class="col-md-4">
                <input name="password2" class="form-control" placeholder="Retype password here" type="password">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Perusahaan</label>
              <div class="col-md-6">
                <select class="form-control" name="id_perusahaan">

                  <?php
                  foreach ($perusahaan as $row) {
                    echo "<option value=\"$row->id_perusahaan\">$row->nama_perusahaan</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-6">
                <input name="jabatan" class="form-control" type="text">
              </div>
            </div>

            <input name="photo" value="image.jpg" type="hidden">
            <input name="status" value="1" type="hidden">

          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-info" value="Save" name="save">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END of ADD-->


<!--EDIT-->
<div class="modal fade" id="modal_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <form action="<?php echo base_url('/admin/update_user/');?>" class="form-horizontal" method="post">
        <div class="modal-body form">
          <div class="form-body">
            <input type="hidden" name="id_user"/>

            <div class="form-group">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-4">
                <input name="username" class="form-control" placeholder="Tidak boleh ada spasi" value="" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-6">
                <input name="nama" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Nomor HP</label>
              <div class="col-md-4">
                <input name="no_hp" class="form-control" type="number">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-6">
                <input name="email" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Perusahaan</label>
              <div class="col-md-6">
                <select class="form-control" name="id_perusahaan">

                  <?php
                  foreach ($perusahaan as $row) {
                    echo "<option value=\"$row->id_perusahaan\">$row->nama_perusahaan</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-6">
                <input name="jabatan" class="form-control" type="text">
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-info" value="Save" name="save">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END of EDIT-->

  </body>
</html>
