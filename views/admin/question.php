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
                          <a class="dt-button buttons-copy buttons-html5 btn btn-white btn-primary btn-bold" data-toggle="modal" href="#modal_add"><span><i class="fa fa-plus bigger-110 green"></i><span class="hidden">Add New Question</span></span></a>
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
                            <th style="width: 10%">Category</th>                          
                            <th style="width: 43%">Question</th>
                            <th style="width: 30%">Option</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                  <?php
                    if(empty($question)){
                      echo "<td colspan='6'>Belum ada data...</td>";
                    } else{
                      $no=0;
                      foreach ($question as $row) {
                        $no++;

                        echo "<tr><td class=\"center\"><label class=\"pos-rel\"><input type=\"checkbox\" class=\"ace\" /><span class=\"lbl\"></span></label></td>";
                        echo "<td>$no</td>";
                        echo "<td>$row->nama_category</td>";
                        echo "<td style=\"font-size:90%;\">$row->question</td>";
                        
                        echo "<td class=\"hidden-480\"><textarea readonly rows=\"6\" cols=\"70\" style=\"font-size:80%;\">1. $row->option_1
2. $row->option_2
3. $row->option_3
4. $row->option_4
5. $row->option_5
6. $row->option_6
                        </textarea></td>";

                        $status = $row->status;
                        if ($status == 0) {
                          echo "<td><span class='label label-lg label-success'><i class='ace-icon fa fa-eye'></i> Show</span></td>";
                        } else {
                          echo "<td><span class='label label-lg label-warning'><i class='ace-icon fa fa-eye-slash'></i> Hide</span></td>";
                        }

                        //actions
                        echo "<td><div class='hidden-sm hidden-xs action-buttons'>";

                        $status       = $row->status;
                        $id_question  = $row->id_question;
                        echo "<a class='green' href='javascript:void(0)' onclick=\"edit('$id_question')\"><i class=\"ace-icon fa fa-pencil bigger-130\" title=\"Edit\"></i></a>";

                        if ($status == 0) {
                          echo "<a class='red' href=''><i class=\"ace-icon fa fa-close bigger-130\" title=\"Hide This Question\"></i></a>";
                        } else {
                          echo "<a class='green' href=''><i class=\"ace-icon fa fa-check bigger-130\" title=\"Show This Question\"></i></a>";
                        }
                        
                         
                        echo "<a class='red' href='".base_url()."project/del_task/$id_question' onclick=\"return confirm('Are You sure to delete this task?')\"><i class=\"ace-icon fa fa-trash-o bigger-130\" title=\"Delete\"></i></a>";
                        ?>

                        </div>
                      </td>
                      <?php }} ?>

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
  
  function edit(id_question){  

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('admin/ajax_question')?>/" + id_question,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_question"]').val(data.id_question);
            $('[name="id_category"]').val(data.id_category);
            $('[name="komponen"]').val(data.komponen);
            $('[name="question"]').val(data.question);
            $('[name="option_1"]').val(data.option_1);
            $('[name="option_2"]').val(data.option_2);
            $('[name="option_3"]').val(data.option_3);
            $('[name="option_4"]').val(data.option_4);
            $('[name="option_5"]').val(data.option_5);
            $('[name="option_6"]').val(data.option_6);
            $('[name="name"]').val(data.name);
            $('[name="category"]').val(data.category);
            $('[name="status"]').val(data.status);
            $('#modal_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Question'); // Set title to Bootstrap modal title
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
          "aoColumns": [{ "bSortable": false },{ "bSortable": false }, { "bSortable": false },{ "bSortable": false }, { "bSortable": false }, { "bSortable": false },{ "bSortable": false }],
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


<!--ADD NEW-->
<div class="modal fade" id="modal_add" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Add New Question</h3>
      </div>
      <form action="<?php echo base_url('/admin/act_add/');?>" class="form-horizontal" method="post">
        <div class="modal-body form">
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-3">Category</label>
              <div class="col-md-4">
              <select class="form-control" name="id_category">
                  <?php foreach ($category as $row) {
                    echo "<option value='$row->id_category'>$row->id_category . $row->nama_category</option>";
                  } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Component</label>
              <div class="col-md-4">
                <select class="form-control" name="komponen">
                  <option value="1">1. Infoware</option>
                  <option value="2">2. Orgaware</option>
                  <option value="3">3. Technoware</option>
                  <option value="4">4. Humanware</option>
                </select>
              </div>
            </div>
<!--
            <div class="form-group">
              <label class="control-label col-md-3">Name</label>
              <div class="col-md-5">
                <input type="text" class="form-control" name="name">
              </div>
            </div>
-->
            <div class="form-group">
              <label class="control-label col-md-3">Question</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="3" name="question"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 1</label>
              <div class="col-md-9">
                <input name="option_1" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 2</label>
              <div class="col-md-9">
                <input name="option_2" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 3</label>
              <div class="col-md-9">
                <input name="option_3" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 4</label>
              <div class="col-md-9">
                <input name="option_4" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 5</label>
              <div class="col-md-9">
                <input name="option_5" class="form-control" type="text">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 6</label>
              <div class="col-md-9">
                <input name="option_6" class="form-control" type="text">
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
<!--END of ADD NEW-->


<!--EDIT-->
<div class="modal fade" id="modal_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <form action="<?php echo base_url('/admin/act_update/');?>" class="form-horizontal" method="post">
        <div class="modal-body form">
          <div class="form-body">
            <input type="hidden" name="id_question"/> 

            <div class="form-group">
              <label class="control-label col-md-3">Category</label>
              <div class="col-md-4">
                <select class="form-control" name="id_category">
                  <?php foreach ($category as $row) {
                    echo "<option value='$row->id_category'>$row->id_category . $row->nama_category</option>";
                  } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Component</label>
              <div class="col-md-4">
                <select class="form-control" name="komponen">
                  <option value="1">1. Infoware</option>
                  <option value="2">2. Orgaware</option>
                  <option value="3">3. Technoware</option>
                  <option value="4">4. Humanware</option>
                </select>
              </div>
            </div>
<!--
            <div class="form-group">
              <label class="control-label col-md-3">Name</label>
              <div class="col-md-5">
                <input type="text" class="form-control" name="name">
              </div>
            </div>
-->
            <div class="form-group">
              <label class="control-label col-md-3">Question</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="3" name="question"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 1</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="2" name="option_1"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 2</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="2" name="option_2"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 3</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="2" name="option_3"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 4</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="2" name="option_4"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 5</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="2" name="option_5"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Option 6</label>
              <div class="col-md-9">
                <textarea class="form-control" rows="2" name="option_6"></textarea>
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
<!--END of ADD EDIT-->

  </body>
</html>
