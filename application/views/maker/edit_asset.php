<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Step 6 : Pendaftaran Asset Murabahah</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
			<div class="panel panel-default">
				<?php foreach($data->result() as $row){ ?>
				<form method="post" id="formValid" action="<?= site_url(ucfirst('maker/asset/simpanData')) ?>" class="form-horizontal">
				<div class="panel-body">
					<input type="hidden" name="nip" value="<?= $row->nip_member_kop ?>">
					<input type="hidden" name="no_fos" value="<?= $row->no_fos ?>">
					<input type="hidden" id="cif" value="<?= $row->cif_induk ?>">
					<input type="hidden" id="rek" value="<?= $row->rek_nsbh ?>">
					<input type="hidden" id="kop" value="<?= $row->nama_kop ?>">
					<input type="hidden" id="nama" value="<?= $row->nama_nsbh ?>">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Nama Asset Yang Dibiayai/Dibeli <span class="help-text"></span></label>
								<div class="col-md-6">
									<input type="text" name="nama_asset" class="form-control" value="KONS MLTGN">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Keterangan Asset Yang Dibiayai/Dibeli <span class="help-text"></span></label>
								<div class="col-md-6">
									<input type="text" name="ket_asset" class="form-control" value="KONSUMTIF MULTIGUNA">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Nomor CIF <span class="help-text"></span></label>
								<div class="col-md-3">
									<input type="text" class="form-control" value="<?= $row->cif ?>" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Mata Uang <span class="help-text"></span></label>
								<div class="col-md-2">
									<input type="text" class="form-control" value="<?= $row->mata_uang ?>" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Nomor CIF Pemasok <span class="help-text"></span></label>
								<div class="col-md-4">
								<?php $read = '';
								$row->check == 'Y' ? $read : $read .= 'readonly';
									echo "<input type='text' class='form-control' name='cif_pemasok' id='cif_pemasok' value='".$row->cif_pemasok."' ".$read.">";
								?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Nama Pemasok <span class="help-text"></span></label>
								<div class="col-md-6">
								<?php $read = '';
								$row->check == 'Y' ? $read : $read .= 'readonly';
									echo "<input type='text' class='form-control' name='nama_pemasok' id='nama_pemasok' value='".$row->nama_pemasok."' ".$read.">";
								?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-md-3">Rekening Pemasok / Rekening Nasabah <span class="help-text"></span></label>
								<?php $check = "";
								if($row->check == 'Y'){
									echo "<div class='col-md-2'><input type='text' class='form-control' name='rek_pemasok' id='rek_pemasok' value='".$row->rek_pemasok."'>";
									echo "<input type='checkbox' name='checkbox' id='checkbox' checked value='Y' onclick='toggleCheckbox()'><i class='text-muted'> Rekening Pemasok</i></div>";
								} else{
									echo "<div class='col-md-2'><input type='text' class='form-control' name='rek_pemasok' id='rek_pemasok' value='".$row->rek_nsbh."' readonly>";
									echo "<input type='checkbox' name='checkbox' id='checkbox' value='Y' onclick='toggleCheckbox()'><i class='text-muted'> Rekening Pemasok</i></div>";
									echo "<div class='col-md-6'><h5><i class='text-muted'>".$row->nama_nsbh."</i></h5></div>";
								} ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Harga Asset Yang Dibiayai / Dibeli <span class="help-text"></span></label>
								<div class="col-md-3">
									<input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
									<input type="hidden" name="harga" id="harga" value="<?= $row->nom_fasilitas ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Uang Muka</label>
								<div class="col-md-3">
									<input type="text" name="uang_muka" id="dp" class="form-control" value="<?= number_format($row->uang_muka, 0, '.', ',') ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Jumlah Asset Yang Dibiayai / Dibeli <span class="help-text"></span></label>
								<div class="col-md-2">
									<input type="text" name="jumlah_asset" id="jumlah" class="form-control" value="<?= $row->jumlah_asset ?>" onkeyup="return getTotal()">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-6">Total Asset Yang Dibiayai / Dibeli</label>
								<div class="col-md-3">
									<input type="text" name="total_asset" id="total" class="form-control" value="<?= number_format($row->total_asset, 0, '.', ',') ?>" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="btn-groups">
						<a href="<?= site_url(ucfirst('maker/jaminan/edit_jaminan/')).$row->no_fos ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
						<button type="submit" id="button" class="btn btn-primary pull-right">
							Next <i class="glyphicon glyphicon-chevron-right"></i>
						</button>
					</div>
				</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
	function getTotal(){
		harga = document.getElementById('harga').value;
		jumlah = document.getElementById('jumlah').value;
		var uang_muka = $('#dp').val().replace(',','');
		var new_dp = uang_muka.split(',').join('');

		document.getElementById('total').value = numeral((harga*jumlah)-new_dp).format('0,0');
	}
	
	function toggleCheckbox() {
		if (document.getElementById("checkbox").checked){
			rek_pemasok.readOnly = false;
			cif_pemasok.readOnly = false;
			nama_pemasok.readOnly = false;
			rek_pemasok.value = "";
			cif_pemasok.value = "";
			nama_pemasok.value = "";
			<?php $array = array('rek_pemasok','cif_pemasok','nama_pemasok');
	        foreach($array as $val){ ?>
	            $('#formValid').bootstrapValidator('updateStatus', '<?= $val ?>', 'NOT_VALIDATED');
	        <?php } ?>
			$('h5').html('');
		} else {
			rek_pemasok.readOnly = true;
			cif_pemasok.readOnly = true;
			nama_pemasok.readOnly = true;
			rek_pemasok.value = "<?= $row->rek_nsbh ?>";
			cif_pemasok.value = "<?= $row->cif_pemasok ?>";
			nama_pemasok.value = "<?= $row->nama_pemasok ?>";
			<?php $array = array('rek_pemasok','cif_pemasok','nama_pemasok');
	        foreach($array as $val){ ?>
	            $('#formValid').bootstrapValidator('updateStatus', '<?= $val ?>', 'NOT_VALIDATED');
	        <?php } ?>
			$('h5').html('<i class="text-muted"><?= $row->nama_nsbh ?></i>');
		}
	}

	var dp = document.getElementById('dp');
	dp.addEventListener('keyup', function(evt){
		dp.value = numeral(this.value).format('0,0');
	});

	$(document).ready(function(){
		var msg = 'This field is required and can\'t be empty';
        var numb = /^[0-9]+$/;
        var char = /^[A-Z ]+$/;

		$('#formValid').bootstrapValidator({
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				nama_asset: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						stringLength: {
							max: 15
						}
					}
				},
				nama_pemasok: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						stringLength: {
							max: 35
						}
					}
				},
				cif_pemasok: {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: numb
						},
						stringLength: {
							max: 10
						}
					}
				},
				rek_pemasok: {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: numb
						},
						stringLength: {
							max: 16
						},
						stringLength: {
							min: 10
						}
					}
				},
				ket_asset: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						stringLength: {
							max: 35
						}
					}
				},
				uang_muka: {
					validators: {
						regexp: {
							regexp: /^[0-9,]+$/,
							message: 'Please enter only number characters'
						},
						stringLength: {
							max: 19
						}
						<?php /*callback: {
							callback: function(value, validator, $field){
								var val = $field.val();
								if(val != 0){
									return true;
								} else {
									return {
										valid: false,
										message: 'This value is not valid'
									}
								}
							}
						}*/ ?>
					}
				},
				jumlah_asset: {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: numb
						},
						stringLength: {
							max: 10
						}
					}
				}
			}
		});
	});
</script> -->