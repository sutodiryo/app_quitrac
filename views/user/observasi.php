<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>

<div class="page-header">
    <h1> <?php echo $page; ?>
    </h1>
</div>
<!-- /.page-header -->

<?php echo $this->session->flashdata('report');?>


<table class="table table-striped">
    <div class="row">

        <div class="col-xs-12 col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Form Isian</h4>
                    <span class="widget-toolbar">
                        <a href="#" data-action="settings"><i class="ace-icon fa fa-cog"></i></a>
                        <a href="#" data-action="reload"><i class="ace-icon fa fa-refresh"></i></a>
                        <a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
                        <a href="#" data-action="close"><i class="ace-icon fa fa-times"></i></a>
                    </span>
                </div>
                <div class="widget-body">
                                
                    <div class="widget-main">

                        <?php
                            $no=0;
                        foreach ($question as $row) {
                            $no++;

                            if (empty($row->observasi)) {
                                echo "<a data-toggle='modal' href='#modal_obs_$no'><label><font color='red'>$no. $row->question</font></label> <i class='ace-icon fa fa-pencil bigger-140'></i></a><br>";
                            } else {
                                echo "<a data-toggle='modal' href='#modal_obs_$no'><label><font color='green'>$no. $row->question</font></label> <i class='ace-icon fa fa-pencil bigger-140'></i></a><br>";
                            }
                        }?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</table>

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

        <script src="<?php echo base_url()?>assets/admin/js/jquery-2.1.4.min.js"></script>

        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="<?php echo base_url()?>assets/admin/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery-ui.custom.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/spinbox.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/moment.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/daterangepicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.knob.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/autosize.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.inputlimiter.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/bootstrap-tag.min.js"></script>

        <!-- ace scripts -->
        <script src="<?php echo base_url()?>assets/admin/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
                $('#id-disable-check').on('click', function() {
                    var inp = $('#form-input-readonly').get(0);
                    if(inp.hasAttribute('disabled')) {
                        inp.setAttribute('readonly' , 'true');
                        inp.removeAttribute('disabled');
                        inp.value="This text field is readonly!";
                    }
                    else {
                        inp.setAttribute('disabled' , 'disabled');
                        inp.removeAttribute('readonly');
                        inp.value="This text field is disabled!";
                    }
                });

                $('[data-rel=tooltip]').tooltip({container:'body'});
                $('[data-rel=popover]').popover({container:'body'});
            
                autosize($('textarea[class*=autosize]'));
                
                $('textarea.limited').inputlimiter({
                    remText: '%n character%s remaining...',
                    limitText: 'max allowed : %n.'
                });
            
                $.mask.definitions['~']='[+-]';
                $('.input-mask-date').mask('99/99/9999');
                $('.input-mask-phone').mask('(999) 999-9999');
                $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
                $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
            
            
            
                $( "#input-size-slider" ).css('width','200px').slider({
                    value:1,
                    range: "min",
                    min: 1,
                    max: 8,
                    step: 1,
                    slide: function( event, ui ) {
                        var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                        var val = parseInt(ui.value);
                        $('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
                    }
                });
            
                $( "#input-span-slider" ).slider({
                    value:1,
                    range: "min",
                    min: 1,
                    max: 12,
                    step: 1,
                    slide: function( event, ui ) {
                        var val = parseInt(ui.value);
                        $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
                    }
                });
            
            
                
                //"jQuery UI Slider"
                //range slider tooltip example
                $( "#slider-range" ).css('height','200px').slider({
                    orientation: "vertical",
                    range: true,
                    min: 0,
                    max: 100,
                    values: [ 17, 67 ],
                    slide: function( event, ui ) {
                        var val = ui.values[$(ui.handle).index()-1] + "";
            
                        if( !ui.handle.firstChild ) {
                            $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                            .prependTo(ui.handle);
                        }
                        $(ui.handle.firstChild).show().children().eq(1).text(val);
                    }
                }).find('span.ui-slider-handle').on('blur', function(){
                    $(this.firstChild).hide();
                });
                
                
                $( "#slider-range-max" ).slider({
                    range: "max",
                    min: 1,
                    max: 10,
                    value: 2
                });
                
                $( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
                    // read initial values from markup and remove that
                    var value = parseInt( $( this ).text(), 10 );
                    $( this ).empty().slider({
                        value: value,
                        range: "min",
                        animate: true
                        
                    });
                });
                
                $("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
            
                
                $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                    no_file:'No File ...',
                    btn_choose:'Choose',
                    btn_change:'Change',
                    droppable:false,
                    onchange:null,
                    thumbnail:false //| true | large

                });

            
                $('#id-input-file-3').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true,
                    thumbnail: 'small'//large | fit

                    ,
                    preview_error : function(filename, error_code) {

                    }
            
                }).on('change', function(){
                    //console.log($(this).data('ace_input_files'));
                    //console.log($(this).data('ace_input_method'));
                });
                
            
                //dynamically change allowed formats by changing allowExt && allowMime function
                $('#id-file-format').removeAttr('checked').on('change', function() {
                    var whitelist_ext, whitelist_mime;
                    var btn_choose
                    var no_icon
                    if(this.checked) {
                        btn_choose = "Drop images here or click to choose";
                        no_icon = "ace-icon fa fa-picture-o";
            
                        whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                        whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
                    }
                    else {
                        btn_choose = "Drop files here or click to choose";
                        no_icon = "ace-icon fa fa-cloud-upload";
                        
                        whitelist_ext = null;//all extensions are acceptable
                        whitelist_mime = null;//all mimes are acceptable
                    }
                    var file_input = $('#id-input-file-3');
                    file_input
                    .ace_file_input('update_settings',
                    {
                        'btn_choose': btn_choose,
                        'no_icon': no_icon,
                        'allowExt': whitelist_ext,
                        'allowMime': whitelist_mime
                    })
                    file_input.ace_file_input('reset_input');
                    
                    file_input
                    .off('file.error.ace')
                    .on('file.error.ace', function(e, info) {
                    });
                
                });
            
                $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
                .closest('.ace-spinner')
                .on('changed.fu.spinbox', function(){
                    //console.log($('#spinner1').val())
                }); 
                $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:1, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
                $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
                $('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
            
                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose:true});
            
            
                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                .prev().on(ace.click_event, function(){
                    $(this).next().focus();
                });
            
            
                $('#timepicker1').timepicker({
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false,
                    disableFocus: true,
                    icons: {
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down'
                    }
                }).on('focus', function() {
                    $('#timepicker1').timepicker('showWidget');
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });

                if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
                 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
                 icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-arrows ',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                 }
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                
            
                $('#colorpicker1').colorpicker();
                //$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
            
                $('#simple-colorpicker-1').ace_colorpicker();
            
                $(".knob").knob();
                
                
                var tag_input = $('#form-field-tags');
                try{
                    tag_input.tag(
                      {
                        placeholder:tag_input.attr('placeholder'),
                        //enable typeahead by specifying the source array
                        source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead

                      }
                    )
            
                    //programmatically add/remove a tag
                    var $tag_obj = $('#form-field-tags').data('tag');
                    $tag_obj.add('Programmatically Added');
                    
                    var index = $tag_obj.inValues('some tag');
                    $tag_obj.remove(index);
                }
                catch(e) {
                    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
                    tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
                    //autosize($('#form-field-tags'));
                }
                
                
                /////////
                $('#modal-form input[type=file]').ace_file_input({
                    style:'well',
                    btn_choose:'Drop files here or click to choose',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-cloud-upload',
                    droppable:true,
                    thumbnail:'large'
                })

                $('#modal-form').on('shown.bs.modal', function () {
                    if(!ace.vars['touch']) {
                        $(this).find('.chosen-container').each(function(){
                            $(this).find('a:first-child').css('width' , '210px');
                            $(this).find('.chosen-drop').css('width' , '210px');
                            $(this).find('.chosen-search input').css('width' , '200px');
                        });
                    }
                })
                             
                $(document).one('ajaxloadstart.page', function(e) {
                    autosize.destroy('textarea[class*=autosize]')
                    
                    $('.limiterBox,.autosizejs').remove();
                    $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
                });
            
            });
        </script>

                        <?php
                            $no=0;
                        foreach ($question as $row) {
                            $no++; ?>
                            
                            <div class="modal fade" id="modal_obs_<?php echo $no;?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><?php echo $row->question; ?></h4>
                                        </div>
                                        <form class="form-horizontal" method="post" action="<?php if (isset($row->observasi) || isset($row->quiz)) {echo base_URL()."user/update_o/"; } else {echo base_URL()."user/add_o/";}?>" accept-charset="utf-8" enctype="multipart/form-data">
                                        
                                        <div class="modal-body form">
                                            <div class="form-body">
                                                <input type="hidden" name="id_perusahaan" value="<?php echo $this->session->userdata('log_id_per');?>">
                                                <input type="hidden" name="id_question" value="<?php echo $row->id_question;?>">
                                                
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" name="observasi" rows="10"><?php if (empty($row->observasi)) {} else { echo $row->observasi;}?></textarea>
                                                        <br>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-info" value="Save" name="save">
                                            <!--<button type="submit" class="btn btn-sm btn-success">Simpan<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i></button>-->
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                        
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        
                        <?php }?>

    </body>
</html>
