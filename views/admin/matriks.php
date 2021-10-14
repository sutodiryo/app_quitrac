<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>

<div class="page-header">
    <h1><?php echo $page; ?></h1>
</div>
<!-- /.page-header -->
<?php echo $this->session->flashdata('report');?>

  <div class="row">
    <div class="col-xs-12">

      <div class="col-xs-6 col-sm-3 pricing-box">
        <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Technoware</h5>
        </div>
        </div>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10%">Nilai</th>
              <th style="width: 40%">Derajat Kecanggihan</th>
              <th style="width: 7%">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php if(empty($technoware)){
            echo "<td colspan='6'>Belum ada data...</td>";
          } else{
            foreach ($technoware as $row) {
              echo "<tr><td >$row->nilai</td>";
              echo "<td >$row->derajat</td>";
              echo "<td><div class='hidden-sm hidden-xs action-buttons'>";
              echo "<a class='green' href='javascript:void(0)' onclick=\"edit('$row->id_matriks')\"><i class=\"ace-icon fa fa-pencil bigger-130\" title=\"Edit\"></i></a>";
              ?>
            </div>
            <div class="hidden-md hidden-lg">
              <div class="inline pos-rel">
                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"><i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>
                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                  <li><a href="<?php echo base_url()?>list_task/edit/$nilai" class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
                </ul>
              </div>
            </div>
          </td>
          <?php }} ?>
          </tbody>
        </table>
      </div>

      <div class="col-xs-6 col-sm-3 pricing-box">
        <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Humanware</h5>
        </div>
        </div>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10%">Nilai</th>
              <th style="width: 40%">Derajat Kecanggihan</th>
              <th style="width: 7%">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php if(empty($humanware)){
            echo "<td colspan='6'>Belum ada data...</td>";
          } else{
            foreach ($humanware as $row) {
              echo "<tr><td >$row->nilai</td>";
              echo "<td >$row->derajat</td>";
              echo "<td><div class='hidden-sm hidden-xs action-buttons'>";
              echo "<a class='green' href='javascript:void(0)' onclick=\"edit('$row->id_matriks')\"><i class=\"ace-icon fa fa-pencil bigger-130\" title=\"Edit\"></i></a>";
              ?>
            </div>
            <div class="hidden-md hidden-lg">
              <div class="inline pos-rel">
                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"><i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>
                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                  <li><a href="<?php echo base_url()?>list_task/edit/$nilai" class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
                </ul>
              </div>
            </div>
          </td>
          <?php }} ?>
          </tbody>
        </table>
      </div>

            <div class="col-xs-6 col-sm-3 pricing-box">
        <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Infoware</h5>
        </div>
        </div>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10%">Nilai</th>
              <th style="width: 40%">Derajat Kecanggihan</th>
              <th style="width: 7%">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php if(empty($infoware)){
            echo "<td colspan='6'>Belum ada data...</td>";
          } else{
            foreach ($infoware as $row) {
              echo "<tr><td >$row->nilai</td>";
              echo "<td >$row->derajat</td>";
              echo "<td><div class='hidden-sm hidden-xs action-buttons'>";
              echo "<a class='green' href='javascript:void(0)' onclick=\"edit('$row->id_matriks')\"><i class=\"ace-icon fa fa-pencil bigger-130\" title=\"Edit\"></i></a>";
              ?>
            </div>
            <div class="hidden-md hidden-lg">
              <div class="inline pos-rel">
                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"><i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>
                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                  <li><a href="<?php echo base_url()?>list_task/edit/$nilai" class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
                  </ul>
              </div>
            </div>
          </td>
          <?php }} ?>
          </tbody>
        </table>
      </div>

            <div class="col-xs-6 col-sm-3 pricing-box">
        <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Orgaware</h5>
        </div>
        </div>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10%">Nilai</th>
              <th style="width: 40%">Derajat Kecanggihan</th>
              <th style="width: 7%">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php if(empty($orgaware)){
            echo "<td colspan='6'>Belum ada data...</td>";
          } else{
            foreach ($orgaware as $row) {
              echo "<tr><td >$row->nilai</td>";
              echo "<td >$row->derajat</td>";
              echo "<td><div class='hidden-sm hidden-xs action-buttons'>";
              echo "<a class='green' href='javascript:void(0)' onclick=\"edit('$row->id_matriks')\"><i class=\"ace-icon fa fa-pencil bigger-130\" title=\"Edit\"></i></a>";
              ?>
            </div>
            <div class="hidden-md hidden-lg">
              <div class="inline pos-rel">
                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"><i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>
                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                  <li><a href="<?php echo base_url()?>list_task/edit/$nilai" class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
                </ul>
              </div>
            </div>
          </td>
          <?php }} ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>



 
<!-- PAGE CONTENT ENDS -->
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
  
  function edit(id_matriks){  

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url('admin/ajax_matriks')?>/" + id_matriks,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="id_matriks"]').val(data.id_matriks);
            $('[name="nilai"]').val(data.nilai);
            $('[name="derajat"]').val(data.derajat);
            $('#modal_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Derajat Kecanggihan'); // Set title to Bootstrap modal title
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


<!--EDIT-->
<div class="modal fade" id="modal_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <form action="<?php echo base_url('/admin/act_update_matriks/');?>" class="form-horizontal" method="post">
        <div class="modal-body form">
          <div class="form-body">
            <input type="hidden"  name="id_matriks"/>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai</label>
              <div class="col-md-2">
                <input name="nilai" readonly class="form-control" value="" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Derajat Kecanggihan</label>
              <div class="col-md-4">
                <input name="derajat" class="form-control" type="text">
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
