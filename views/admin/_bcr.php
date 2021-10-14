<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>

<div class="page-header">
  <h1><?php echo $page; foreach ($perusahaan as $p) {echo $p->nama_perusahaan;} $perusahaan; ?></h1>
</div>
<!-- /.page-header -->
<?php echo $this->session->flashdata('report');?>

<div class="row">
  <div class="col-xs-12">

    <?php if(empty($bcr)){ ?>
      <div class="error-container">
        <div class="well">
         <h1 class="grey lighter smaller"><span class="blue bigger-125"><i class="ace-icon fa fa-close"></i> Belum ada data... </span></h1>
         <hr/>
         <h3 class="lighter smaller"> Silahkan input <a data-toggle="modal" href="#modal_add_bcr"> disini! <i class="ace-icon fa fa-pencil icon-animated-wrench bigger-125"></i></a> </h3>
         <hr/>
         <div class="center">
          <a href="javascript:history.back()" class="btn btn-grey"><i class="ace-icon fa fa-arrow-left"></i>Kembali</a>
          <a data-toggle="modal" href="#modal_add_bcr" class="btn btn-primary"><i class="ace-icon fa fa-pencil"></i>Input Data</a>
        </div>
      </div>
    </div>
    
  <?php } else{
    foreach ($bcr as $row) {
      $id_perusahaan = $row->id_perusahaan;
      $bs            = $row->bs;
      $btk           = $row->btk;
      $be            = $row->be;
      $bi            = $row->bi;
      $ce            = $row->ce;
      $ci            = $row->ci;
      $cx            = $row->cx;
      $cm            = $row->cm;
      $com           = $row->com;
      $sv            = $row->sv;
      $n             = $row->n;
      $i             = $row->i;
      ?>

      <div class="col-xs-12 col-sm-12 pricing-box">


        <div class="clearfix">
          <div class="pull-right tableTools-container">
            <div class="dt-buttons btn-overlap btn-group">
              <a class="dt-button buttons-html5 btn btn-white btn-primary btn-bold" href='javascript:void(0)' onclick="edit('<?php echo $id_perusahaan; ?>')"><span><i class="fa fa-pencil bigger-110 green"></i></span></a>
              <a class="dt-button buttons-html5 btn btn-white btn-primary btn-bold" href="javascript:history.back()"><span><i class="fa fa-reply-all bigger-110 orange"></i></span></a>
            </div>
          </div>
        </div>
        
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 5%;" class="center">Variabel</th>
              <th style="width: 40%;" class="center">Deskripsi</th>
              <th style="width: 35%;" class="center">Nilai</th>
              <th style="width: 20%;" class="center">Satuan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            echo "<tr><td>Bs</td><td>Nilai manfaat jumlah penjualan</td><td>$bs</td><td>Rupiah / tahun</td></tr>
            <tr><td>Btk</td><td>Nilai manfaat tenaga kerja</td><td>$btk</td><td>Rupiah / tahun</td></tr>
            <tr><td>Be</td><td>Nilai manfaat efisiensi produksi</td><td>$be</td><td>Rupiah / tahun</td></tr>
            <tr><td>Bi</td><td>Nilai manfaat inventory</td><td>$bi</td><td>Rupiah / tahun</td></tr>
            <tr><td>Ce</td><td>Biaya perangkat</td><td>$ce</td><td>Rupiah di awal tahun pertama</td></tr>
            <tr><td>Ci</td><td>Biaya implementasi</td><td>$ci</td><td>Rupiah di awal tahun pertama</td></tr>
            <tr><td>Cx</td><td>Biaya pelatihan</td><td>$cx</td><td>Rupiah di awal tahun pertama</td></tr>
            <tr><td>Cm</td><td>Biaya perawatan (maintenance) perangkat</td><td>$cm</td><td>Rupiah di awal tahun pertama</td></tr>
            <tr><td>Com</td><td>Biaya operation and maintenance</td><td>$com</td><td>Rupiah / tahun</td></tr>
            <tr><td>Sv</td><td>Salvage value</td><td>$sv</td><td>Rupiah di akhir tahun ke 5</td></tr>
            <tr><td>n</td><td>Periode analisis</td><td>$n</td><td>tahun</td></tr>
            <tr><td>i</td><td>Suku bunga</td><td>$i</td><td>%</td></tr>";

            echo "<tr><td colspan='2' style=\"text-align:right;\">Bs+Btk+Be+Bi = </td><td colspan='2'>Rp<b>".number_format(($bs+$btk+$be+$bi), 0, '', '.')."</b> /tahun</td></tr>";
            echo "<tr><td colspan='2' style=\"text-align:right;\">Bs+Btk+Be+Bi  di awal tahun pertama = </td><td colspan='2'>Rp<b>".number_format(round((($bs+$btk+$be+$bi)*(((pow((1+0.1),5))-1)/(0.1*pow((1+0.1),5)))), 2), 0, '', '.')."</b> di awal tahun pertama</td></tr>";
            
            echo "<tr><td colspan='2' style=\"text-align:right;\">Ce+Ci+Cx+Cm = </td><td colspan='2'>Rp<b>".number_format(round(($ce+$ci+$cx+$cm), 2), 0, '', '.')."</b> di awal tahun pertama</td></tr>";

            echo "<tr><td colspan='2' style=\"text-align:right;\">Com di awal tahun pertama  = </td><td colspan='2'>Rp<b>".number_format(round(($com*(((pow((1+0.1),5))-1)/(0.1*pow((1+0.1),5)))), 2), 0, '', '.')."</b> di awal tahun pertama</td></tr>";
            
            echo "<tr><td colspan='2' style=\"text-align:right;\">Nilai sisa di awal tahun pertama = </td><td colspan='2'>Rp<b>".number_format(round(($sv*(1/(pow((1+0.1),5)))), 2), 0, '', '.')."</b> di awal tahun pertama</td></tr>";
            
            echo "<tr><td colspan='2' style=\"text-align:right;\">Total biaya = </td><td colspan='2'>Rp<b>".number_format(round((($ce+$ci+$cx+$cm)+($com*(((pow((1+0.1),5))-1)/(0.1*pow((1+0.1),5)))) - ($sv*(1/(pow((1+0.1),5)))) ), 2), 0, '', '.')."</b> di awal tahun pertama</td></tr>";
            
            echo "<tr><td colspan='2' style=\"text-align:right;\"><font color='red'>Benefit / Cost = </font></td><td colspan='2'><b><font color='red'>".round(( (($bs+$btk+$be+$bi)*(((pow((1+0.1),5))-1)/(0.1*pow((1+0.1),5)))) /  ( ($ce+$ci+$cx+$cm)+($com*(((pow((1+0.1),5))-1)/(0.1*pow((1+0.1),5)))) - ($sv*(1/(pow((1+0.1),5)))) ) ) ,2)."</font></b></td></tr>";
            ?>
          </tbody>
        </table>
      </div>

    <?php  }} ?>

  </div>


</div>

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
  
  function edit(id_perusahaan){  

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('admin/get_bcr')?>/" + id_perusahaan,
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('[name="id_perusahaan"]').val(data.id_perusahaan);
        $('[name="bs"]').val(data.bs);
        $('[name="btk"]').val(data.btk);
        $('[name="be"]').val(data.be);
        $('[name="bi"]').val(data.bi);
        $('[name="ce"]').val(data.ce);
        $('[name="ci"]').val(data.ci);
        $('[name="cx"]').val(data.cx);
        $('[name="cm"]').val(data.cm);
        $('[name="com"]').val(data.com);
        $('[name="sv"]').val(data.sv);
        $('[name="n"]').val(data.n);
        $('[name="i"]').val(data.i);
            $('#modal_edit_bcr').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Benefit Cost Ratio Penjualan'); // Set title to Bootstrap modal title
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

    <!--ADD-->
    <div class="modal fade" id="modal_add_bcr" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Form Input Data Benefit Cost Ratio</h3>
          </div>
          <form action="<?php echo base_url('/admin/act_add_bcr/');?>" class="form-horizontal" method="post">
            <div class="modal-body form">
              <div class="form-body">

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Jumlah Penjualan (Bs)</label>
                  <div class="col-md-6">
                    <input name="bs" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Tenaga Kerja (Btk)</label>
                  <div class="col-md-6">
                    <input name="btk" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Efisiensi Produksi (Be)</label>
                  <div class="col-md-6">
                    <input name="be" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Inventory (Bi)</label>
                  <div class="col-md-6">
                    <input name="bi" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Perangkat (Ce)</label>
                  <div class="col-md-6">
                    <input name="ce" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Implementasi (Ci)</label>
                  <div class="col-md-6">
                    <input name="ci" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Pelatihan (Cx)</label>
                  <div class="col-md-6">
                    <input name="cx" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Perawatan Perangkat (Cm)</label>
                  <div class="col-md-6">
                    <input name="cm" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Operation and Maintenance (Com)</label>
                  <div class="col-md-6">
                    <input name="com" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Salvage Value (Sv)</label>
                  <div class="col-md-4">
                    <input name="sv" class="form-control" placeholder="Rupiah di akhir tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Periode Analisis (n)</label>
                  <div class="col-md-2">
                    <input name="n" class="form-control" placeholder="Tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Suku Bunga (i)</label>
                  <div class="col-md-2">
                    <input name="i" class="form-control" type="number">
                  </div>
                  <label class="control-label">%</label>
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
    <!--END of ADD-->


    <!--EDIT-->
    <div class="modal fade" id="modal_edit_bcr" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <form action="<?php echo base_url('/admin/act_update_bcr/');?>" class="form-horizontal" method="post">
            <div class="modal-body form">
              <div class="form-body">

                <input name="id_perusahaan" type="hidden">

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Jumlah Penjualan (Bs)</label>
                  <div class="col-md-6">
                    <input name="bs" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Tenaga Kerja (Btk)</label>
                  <div class="col-md-6">
                    <input name="btk" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Efisiensi Produksi (Be)</label>
                  <div class="col-md-6">
                    <input name="be" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Nilai Manfaat Inventory (Bi)</label>
                  <div class="col-md-6">
                    <input name="bi" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Perangkat (Ce)</label>
                  <div class="col-md-6">
                    <input name="ce" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Implementasi (Ci)</label>
                  <div class="col-md-6">
                    <input name="ci" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Pelatihan (Cx)</label>
                  <div class="col-md-6">
                    <input name="cx" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Perawatan Perangkat (Cm)</label>
                  <div class="col-md-6">
                    <input name="cm" class="form-control" placeholder="Rupiah di awal tahun pertama" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Biaya Operation and Maintenance (Com)</label>
                  <div class="col-md-6">
                    <input name="com" class="form-control" placeholder="Rupiah / tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Salvage Value (Sv)</label>
                  <div class="col-md-4">
                    <input name="sv" class="form-control" placeholder="Rupiah di akhir tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Periode Analisis (n)</label>
                  <div class="col-md-2">
                    <input name="n" class="form-control" placeholder="Tahun" type="number">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6">Suku Bunga (i)</label>
                  <div class="col-md-2">
                    <input name="i" class="form-control" type="number">
                  </div>
                  <label class="control-label">%</label>
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
