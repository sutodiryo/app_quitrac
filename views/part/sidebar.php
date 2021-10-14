		<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_URL();?>" class="navbar-brand">
						<small>
							<i class="fa fa-check-square-o"></i>
							Quick Traceability Assessment
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url('assets/uploads/users/'); echo $this->session->userdata('log_img'); ?>" alt="<? echo $this->session->userdata('log_name'); ?>" />
								
								<span class="user-info">
									<small>Login Sebagai</small>
									<?php echo $this->session->userdata('log_name'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<!--
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Pengaturan
									</a>
								</li>

								<li>
									<a href="<?php echo base_url()?>users/<?php echo $this->session->userdata('log_id'); ?>">
										<i class="ace-icon fa fa-user"></i>
										Profil
									</a>
								</li>

								<li>
									<a href="<?php echo base_url()?>users/users/<?php echo $this->session->userdata('log_id'); ?>">
										<i class="ace-icon fa fa-users"></i>
										Pengguna
									</a>
								</li>

								<li class="divider"></li>

								-->

								<li>
									<a href="<?php echo base_url()?>login/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>


		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<?php if ($this->session->userdata('log_id') == 1) { ?>
						<a class="btn btn-success" href="<?php echo base_url('admin/bcr')?>">
							<i class="ace-icon fa fa-bar-chart-o"></i>
						</a>
						<a class="btn btn-info" href="<?php echo base_url('admin/perusahaan')?>">
							<i class="ace-icon fa fa-building"></i>
						</a>
						<a class="btn btn-warning" href="<?php echo base_url('admin/user')?>">
							<i class="ace-icon fa fa-users"></i>
						</a>
						<a class="btn btn-danger" href="<?php echo base_url('admin/matriks')?>">
							<i class="ace-icon fa fa-cogs"></i>
						</a>
						<?php } else{?>

						<a class="btn btn-success" href="#">
							<i class="ace-icon fa fa-bar-chart-o"></i>
						</a>
						<a class="btn btn-info" href="#">
							<i class="ace-icon fa fa-building"></i>
						</a>
						<a class="btn btn-warning" href="#">
							<i class="ace-icon fa fa-users"></i>
						</a>
						<a class="btn btn-danger" href="#">
							<i class="ace-icon fa fa-cogs"></i>
						</a>
						<?php }?>

					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->


<!--Menu ADMIN-->
<?php if ($this->session->userdata('log_status') == 2) { ?>
				<ul class="nav nav-list">

				<?php $id = $this->session->userdata('log_id'); ?>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Dashboard'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin')?>"><i class="menu-icon fa fa-home"></i><span class="menu-text">Beranda</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Daftar Perusahaan'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/perusahaan')?>"><i class="menu-icon fa fa-building"></i><span class="menu-text">Perusahaan</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Daftar Pengguna'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/user')?>"><i class="menu-icon fa fa-users"></i><span class="menu-text">Pengguna</span></a>
						<b class="arrow"></b>
					</li>
					
					<!--
					<li <?php if(empty($page)){echo "";} elseif ($page == 'Observasi Penerapan Teknologi'){echo "class=\"active open\"";}?> <?php if(empty($page)){echo "";} elseif ($page == 'Kuesioner'){echo "class=\"active open\"";}?><?php if(empty($page)){echo "";} elseif ($page == 'List Data'){echo "class=\"active open\"";}?>>
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-search-plus"></i><span class="menu-text">Observasi Teknologi</span><b class="arrow fa fa-angle-down"></b></a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if(empty($page)){echo "";} elseif ($page == 'Observasi Penerapan Teknologi'){echo "class=\"active\"";}?>>
								<a href="<?php echo base_url('form/observasi')?>"><i class="menu-icon fa fa-caret-right"></i>Form Isian Observasi</a>
								<b class="arrow"></b>
							</li>

							<li <?php if(empty($page)){echo "";} elseif ($page == 'Kuesioner'){echo "class=\"active\"";}?>>
								<a href="<?php echo base_url('form/kuesioner')?>"><i class="menu-icon fa fa-caret-right"></i>Form Isian Kuesioner</a>
								<b class="arrow"></b>
							</li>

							<li <?php if(empty($page)){echo "";} elseif ($page == 'List Data'){echo "class=\"active\"";}?>>
								<a href="<?php echo base_url('admin/list')?>"><i class="menu-icon fa fa-caret-right"></i>List Data</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Hasil Survey'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/survey')?>"><i class="menu-icon fa fa-list"></i><span class="menu-text">Hasil Survey</span></a>
						<b class="arrow"></b>
					</li>
					-->	

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Derajat Kecanggihan'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/derajat_kecanggihan')?>"><i class="menu-icon fa fa-table"></i><span class="menu-text">Derajat Kecanggihan</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Nilai TCC'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/tcc')?>"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text">Nilai TCC</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Radar Diagram'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/radar')?>"><i class="menu-icon fa fa-area-chart"></i><span class="menu-text">Diagram Radar</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Justifikasi Investasi'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/justifikasi')?>"><i class="menu-icon fa fa-balance-scale"></i><span class="menu-text">Justifikasi Investasi</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Perhitungan Benefit Cost Ratio '){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin/bcr')?>"><i class="menu-icon fa fa-bar-chart-o"></i><span class="menu-text">Benefit Cost Ratio</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Edit Pertanyaan Kuesioner' | $page == 'Matriks Komponen Teknologi' | $page == 'Pengaturan Bobot'){echo "class=\"active open\"";}?>>
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-cog"></i><span class="menu-text">Pengaturan</span><b class="arrow fa fa-angle-down"></b></a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if(empty($page)){echo "";} elseif ($page == 'Edit Pertanyaan Kuesioner'){echo "class=\"active\"";}?>>
								<a href="<?php echo base_url('admin/question')?>"><i class="menu-icon fa fa-caret-right"></i>Edit Pertanyaan Kuesioner</a>
								<b class="arrow"></b>
							</li>

							<li <?php if(empty($page)){echo "";} elseif ($page == 'Matriks Komponen Teknologi'){echo "class=\"active\"";}?>>
								<a href="<?php echo base_url('admin/matriks')?>"><i class="menu-icon fa fa-caret-right"></i>Matriks Komponen Teknologi</a>
								<b class="arrow"></b>
							</li>

							<li <?php if(empty($page)){echo "";} elseif ($page == 'Pengaturan Bobot'){echo "class=\"active\"";}?>>
								<a href="<?php echo base_url('admin/bobot')?>"><i class="menu-icon fa fa-caret-right"></i>Bobot</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->
<?php } ?>
<!--End of Menu ADMIN-->


<?php if ($this->session->userdata('log_status') == 1) { ?>
				<ul class="nav nav-list">

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Dashboard'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('admin')?>"><i class="menu-icon fa fa-home"></i><span class="menu-text">Beranda</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Observasi Penerapan Teknologi'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('user/observasi')?>"><i class="menu-icon fa fa-search-plus"></i><span class="menu-text">Observasi Teknologi</span></a>
						<b class="arrow"></b>
					</li>

					<li <?php if(empty($page)){echo "";} elseif ($page == 'Form Kuesioner'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('user/quiz')?>"><i class="menu-icon fa fa-check-square"></i><span class="menu-text">Form Kuesioner</span></a>
						<b class="arrow"></b>
					</li>
<!--
					<li <?php if(empty($page)){echo "";} elseif ($page == 'List Data'){echo "class=\"active\"";}?>>
						<a href="<?php echo base_url('user/list_data')?>/<?php echo $this->session->userdata('log_id_per'); ?>"><i class="menu-icon fa fa-list"></i><span class="menu-text">List Data</span></a>
						<b class="arrow"></b>
					</li>	
-->
				</ul><!-- /.nav-list -->
<?php } ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					
					<?if ($page == 'Penilaian Amal Yaumi') {
						echo "";
					} else {
						echo "<div class='breadcrumbs ace-save-state' id='breadcrumbs'><ul class='breadcrumb'><li><i class='ace-icon fa fa-home home-icon'></i><a href='<?echo base_url()?>''>Home</a></li><li class='active'>".$page."</li></ul><!-- /.breadcrumb -->";
					}?>

					 <div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
					

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->