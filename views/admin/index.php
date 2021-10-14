<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>

<div class="page-header">
	<h1>Dashboard</h1>
</div><!-- /.page-header -->



<div class="col-xs-12">

	<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
	<i class="ace-icon fa fa-check-square-o green"></i>
	Welcome to
	<strong class="green">
		Quitrac App
	</strong> (Quick Traceability Assessment).
	</div>

	<div class="row">

		<div class="col-sm-7 infobox-container">
			<div class="infobox infobox-green">
				<div class="infobox-icon"><i class="ace-icon fa fa-building"></i></div>
				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo $total;?></span>
					<div class="infobox-content">Total Perusahaan</div>
				</div>
			</div>

			<div class="infobox infobox-blue">
				<div class="infobox-icon"><i class="ace-icon fa fa-search"></i></div>
				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo $teliti;?></span>
					<div class="infobox-content">Sedang diteliti</div>
				</div>
			</div>

			<div class="infobox infobox-pink">
				<div class="infobox-icon"><i class="ace-icon fa fa-flask"></i></div>
				<div class="infobox-data">
					<span class="infobox-data-number"><?php echo $refer;?></span>
					<div class="infobox-content">Perusahaan Referensi</div>
				</div>
			</div>
		</div><!-- /.widget-box -->
	</div>
</div>
</div>
</div>
</div>
				

<?php $this->load->view("part/footer");?>