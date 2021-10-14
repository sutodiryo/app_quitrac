<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Quick Traceability Assessment</title>

		<meta name="description" content="SI Pondok Preneur" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/chosen.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap-duallistbox.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/ace-rtl.min.css" />


		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/ace-rtl.min.css" />

		<!-- ace settings handler -->
		<script src="<?php echo base_url()?>assets/admin/js/ace-extra.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/js/jquery-1.11.3.min.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
    	$('select').select2();
		});	
		</script>

		<style>
        #image-preview {
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
        }
        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }
        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }

    	</style>

	</head>