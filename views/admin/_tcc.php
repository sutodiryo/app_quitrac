<?php $this->load->view("part/header");?>
<?php $this->load->view("part/sidebar");?>
	
	<div class="page-header">
		<h1>
			Nilai TCC
		</h1>
	</div><!-- /.page-header -->
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12">
				<?php
				foreach ($bobot as $row) {
					$nilai[] = $row->nilai;
				}
				$alfa 	= $nilai[0];
				$beta1	= $nilai[1];
				$beta2	= $nilai[2];
				$beta3	= $nilai[3];
	            $beta4	= $nilai[4];
	            $exp    = 0.25;
	            ?>
				<h3><?php foreach ($diukur as $d) { echo $d->nama_perusahaan;} ?> (Perusahaan Yang diukur)</h3>
				<?php if (empty($tcc1) | in_array("0", $tcc1)) {
				echo "<font color='red'>Masih ada nilai kosong</font>";
				} else { ?>

				<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>
							<th style="width: 10%" rowspan="2" class="center">Proses Bisnis</th>
							<th style="width: 40%" colspan="4" class="center">Komponen</th>
							<th style="width: 40%" colspan="4" class="center">Perhitungan per Komponen</th>
							<th style="width: 10%" rowspan="2" class="center">TCC</th>
						</tr>

						<tr>
							<td style="width: 10%" class="center"><label>Technoware</label></td>
							<td style="width: 10%" class="center"><label>Humanware </label></td>
							<td style="width: 10%" class="center"><label>Infoware </label></td>
							<td style="width: 10%" class="center"><label>Orgaware </label></td>
												
							<td style="width: 10%" class="center"><label>Technoware </label> </td>
							<td style="width: 10%" class="center"><label>Humanware </label> </td>
							<td style="width: 10%" class="center"><label>Infoware </label> </td>
							<td style="width: 10%" class="center"><label>Orgaware </label> </td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<table>
									<tbody>
										<tr><td>Order</td></tr>
										<tr><td>Timbang</td></tr>
										<tr><td>Sortir</td></tr>
										<tr><td>Kemas</td></tr>
										<tr><td>Simpan</td></tr>
										<tr><td>Kirim</td></tr>
									</tbody>
								</table>
							</td>

							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc1 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 1) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
										} ?>
									</tbody>
								</table>
							</td>

							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc1 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 3) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
										} ?>
									</tbody>
								</table>
							</td>
							
							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc1 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 4) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
										} ?>
									</tbody>
								</table>
							</td>
							
							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc1 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 5) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
										} ?>
									</tbody>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc1 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 1) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $t[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc1 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 3) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $h[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc1 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 4) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $i[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc1 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 5) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $o[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>
							
							<td>
								<table>
									<tbody>
										<?php $a=0.2; $exp2=0.25;?>
										<tr>
											<td>
												<?php
													 echo round($a*((pow((pow($t[0], $exp)), $exp2))+(pow((pow($h[0], $exp)), $exp2))+(pow((pow($i[0], $exp)), $exp2))+(pow((pow($o[0], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t[1], $exp)), $exp2))+(pow((pow($h[1], $exp)), $exp2))+(pow((pow($i[1], $exp)), $exp2))+(pow((pow($o[1], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t[2], $exp)), $exp2))+(pow((pow($h[2], $exp)), $exp2))+(pow((pow($i[2], $exp)), $exp2))+(pow((pow($o[2], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t[3], $exp)), $exp2))+(pow((pow($h[3], $exp)), $exp2))+(pow((pow($i[3], $exp)), $exp2))+(pow((pow($o[3], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t[4], $exp)), $exp2))+(pow((pow($h[4], $exp)), $exp2))+(pow((pow($i[4], $exp)), $exp2))+(pow((pow($o[4], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t[5], $exp)), $exp2))+(pow((pow($h[5], $exp)), $exp2))+(pow((pow($i[5], $exp)), $exp2))+(pow((pow($o[5], $exp)), $exp2))), 3);
												 ?>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<?php }?>

				<h3><?php foreach ($referensi as $r) { echo $r->nama_perusahaan;} ?> (Perusahaan Referensi)</h3>
				<?php if (empty($tcc2) | in_array("0", $tcc2)) {
				echo "<font color='red'>Masih ada nilai kosong</font>";
				} else { ?>

				<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>
							<th style="width: 10%" rowspan="2" class="center">Proses Bisnis</th>
							<th style="width: 40%" colspan="4" class="center">Komponen</th>
							<th style="width: 40%" colspan="4" class="center">Perhitungan per Komponen</th>
							<th style="width: 10%" rowspan="2" class="center">TCC</th>
						</tr>

						<tr>
							<td style="width: 10%" class="center"><label>Technoware</label></td>
							<td style="width: 10%" class="center"><label>Humanware </label></td>
							<td style="width: 10%" class="center"><label>Infoware </label></td>
							<td style="width: 10%" class="center"><label>Orgaware </label></td>
												
							<td style="width: 10%" class="center"><label>Technoware </label> </td>
							<td style="width: 10%" class="center"><label>Humanware </label> </td>
							<td style="width: 10%" class="center"><label>Infoware </label> </td>
							<td style="width: 10%" class="center"><label>Orgaware </label> </td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<table>
									<tbody>
										<tr><td>Order</td></tr>
										<tr><td>Timbang</td></tr>
										<tr><td>Sortir</td></tr>
										<tr><td>Kemas</td></tr>
										<tr><td>Simpan</td></tr>
										<tr><td>Kirim</td></tr>
									</tbody>
								</table>
							</td>

							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc2 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 1) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
                                            
										} ?>
									</tbody>
								</table>
							</td>

							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc2 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 3) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
                                            
										} ?>
									</tbody>
								</table>
							</td>
							
							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc2 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 4) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
										} ?>
									</tbody>
								</table>
							</td>
							
							<td class="center">
								<table>
									<tbody>
										<?php foreach ($tcc2 as $row) {
                                            echo "<tr><td>";
                                            if ($row->komponen == 5) {echo $row->quiz;} else {}
                                            echo "</td></tr>";
                                            
										} ?>
									</tbody>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc2 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 1) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $t2[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc2 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 3) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $h2[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc2 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 4) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $i2[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>

                            <td>
                            	<table>
                            	<?php foreach ($tcc2 as $row) {
									 echo "<tr><td>";
									 if ($row->komponen == 5) { echo round($alfa*(pow($row->quiz, $beta1)), 3); $o2[]=$row->quiz;} else {}
									 echo "</td></tr>";
								} ?>
								</table>
							</td>
							
							<td>
								<table>
									<tbody>
										<?php $a=0.2; $exp2=0.25;?>
										<tr>
											<td>
												<?php
													 echo round($a*((pow((pow($t2[0], $exp)), $exp2))+(pow((pow($h2[0], $exp)), $exp2))+(pow((pow($i2[0], $exp)), $exp2))+(pow((pow($o2[0], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t2[1], $exp)), $exp2))+(pow((pow($h2[1], $exp)), $exp2))+(pow((pow($i2[1], $exp)), $exp2))+(pow((pow($o2[1], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t2[2], $exp)), $exp2))+(pow((pow($h2[2], $exp)), $exp2))+(pow((pow($i2[2], $exp)), $exp2))+(pow((pow($o2[2], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t2[3], $exp)), $exp2))+(pow((pow($h2[3], $exp)), $exp2))+(pow((pow($i2[3], $exp)), $exp2))+(pow((pow($o2[3], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t2[4], $exp)), $exp2))+(pow((pow($h2[4], $exp)), $exp2))+(pow((pow($i2[4], $exp)), $exp2))+(pow((pow($o2[4], $exp)), $exp2))), 3);
													 echo "<br>";
													 echo round($a*((pow((pow($t2[5], $exp)), $exp2))+(pow((pow($h2[5], $exp)), $exp2))+(pow((pow($i2[5], $exp)), $exp2))+(pow((pow($o2[5], $exp)), $exp2))), 3);
												 ?>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<?php }?>

			</div><!-- /.span -->
		</div><!-- /.row -->
	</div>
	
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php $this->load->view("part/footer");?>