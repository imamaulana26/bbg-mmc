<style type="text/css">
	.help-text:after{
		content: "*";
		color: red;
	}
</style>

<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Step 7 : Pendafataran Kontrak (LD)</h1>
	</div>
</div>
<div class="row">
	<div class="panel panel-default">
		<form method="post" id="formValid" action="<?= site_url('admin/kontrak/simpanData') ?>">
		<?php foreach($data->result() as $row){ ?>
		<div class="panel-body">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Input Pembiayaan Financing</strong>
					</div>
					<div class="panel-body">
						<input type="hidden" name="nip" value="<?= $row->nip ?>">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Nomor CIF <span class="help-text"></span></label>
									<input type="text" class="form-control" value="<?= $row->cif ?>" readonly>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-4">
								<div class="form-group">
									<label>Tgl. Angsuran</label>
									<select class="form-control">
										<option value="" selected disabled>-- Pilih --</option>
										<?php for($i=1; $i<=31; $i++){
											$select = '';
											if($row->tgl_angsuran == $i){
												$select = 'selected';
											}
											if($i < 10){
												echo "<option value='$i' ".$select.">0".$i."</option>";
											} else{
												echo "<option value='$i' ".$select.">".$i."</option>";
											}
										} ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Mata Uang</label>
									<input type="text" class="form-control" value="<?= $row->mata_uang ?>">
								</div>
							</div>
							<div class="col-md-5 col-md-offset-4">
								<div class="form-group">
									<label>Nilai Maks. Pembiayaan</label>
									<input type="text" class="form-control" value="<?= number_format($row->nom_max_guna, 0, '.', ',') ?>" readonly>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Kode Unit Kerja <span class="help-text"></span></label>
									<input type="text" name="kode_unit" class="form-control">
								</div>
							</div>
							<div class="col-md-4 col-md-offset-4">
								<div class="form-group">
									<label>Tipe Produk <span class="help-text"></span></label>
									<input type="text" name="tipe_produk" class="form-control" value="MUR0019">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Kode AO Pimpinan Cabang</label>
									<input type="text" class="form-control" value="<?= $row->kode_pim ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kode AO Risk Officer</label>
									<input type="text" class="form-control" value="<?= $row->kode_fao ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Kode AO Marketing <span class="help-text"></span></label>
									<input type="text" class="form-control" value="<?= $row->kode_ao ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Segmentasi Produk <span class="help-text"></span></label>
									<input type="text" name="segmen_produk" class="form-control" value="CONS">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tipe Angsuran <span class="help-text"></span></label>
									<select name="tipe_angsuran" class="form-control">
									<?php $tipe = array('Efektif Tetap','Efektif Sliding','Flat','Proposional','Irregular','Anuitas Ulang Tahun');
									foreach($tipe as $key=>$id){
										if($key+1 == 5){
											echo "<option value='$key+1' selected>".($key+1)." - ".$id."</option>";
										} else{
											echo "<option value='$key+1'>".($key+1)." - ".$id."</option>";
										}
									} ?>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Tenor <span class="help-text"></span></label>
									<input type="text" class="form-control" value="<?= $row->tenor ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>No. Limit Fasilitas</label>
									<input type="text" name="no_limit" class="form-control">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Pengusul Pembiayaan <span class="help-text"></span></label>
									<input type="text" name="pengusul" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Pemutus Pembiayaan <span class="help-text"></span></label>
									<input type="text" name="pemutus" class="form-control">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Rekening Nasabah <span class="help-text"></span></label>
									<input type="text" class="form-control" value="<?= $row->rek_nsbh ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Rekening Pokok <span class="help-text"></span></label>
									<input type="text" class="form-control" value="<?= $row->rek_pokok ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Rekening Margin <span class="help-text"></span></label>
									<input type="text" name="rek_margin" class="form-control">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Penanda Wakalah <span class="help-text"></span></label>
							<div class="radio-inline">
								<label class="radio-inline">
									<input type="radio" name="wakalah" value="NO">NO
								</label>
								<label class="radio-inline">
									<input type="radio" name="wakalah" value="YES" checked>YES
								</label>
							</div>
						</div>

						<div class="form-group">
							<label>Tipe Margin <span class="help-text"></span></label>
							<div class="radio-inline">
								<label class="radio-inline">
									<input type="radio" name="tipe_margin" value="1" checked>1 - Margin Single
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe_margin" value="2">2 - Margin Bertingkat
								</label>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>% Margin</label>
									<input type="text" name="margin" class="form-control" placeholder="Ex. 2.03%">
								</div>
							</div>
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<label>Total Margin</label>
									<input type="text" name="total_margin" class="form-control" readonly>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Biaya Teratribusi <span class="help-text"></span></label>
							<div class="radio-inline">
								<label class="radio-inline">
									<input type="radio" name="teratribusi" value="NO" checked>NO
								</label>
								<label class="radio-inline">
									<input type="radio" name="teratribusi" value="YES">YES
								</label>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Kode Biaya</label>
									<select name="kode_biaya" class="form-control">
									<?php $data = array('FINAPP'=>'Biaya Penilalaian','FINDIS'=>'Biaya Pencairan Murabahah','FINHAJDAKHS'=>'Ujroh Pendaftaran Haji Khusus','FINHAJDAREG'=>'Ujroh Pendaftaran Haji Reguler','FINHAJLUKHS'=>'Ujroh Pelunasan Haji Khusus','FINHAJLUREG'=>'Ujroh Pelunasan Haji Reguler','FINHAJUJROH'=>'Ujroh Pendaftaran Haji','FININS'=>'Biaya Asuransi','FINMAIN'=>'Biaya Pemeliharaan','FINMAINRES'=>'BIAYA RESTRUKTUR','FINMAINRESC'=>'BIAYA RESTRUKTUR KORP','FINMURGOLD'=>'Biaya Pencairan Murabahah Emas','FINNTRY'=>'Biaya Notaris','FINOTH'=>'Biaya Lain - lain','FINPRV'=>'Biaya Provisi Murabahah','FINPRVA'=>'Biaya Provisi Murabahah Amrt','FINSMTP'=>'Biaya Materai');
									foreach($data as $key=>$dt){
										$select = '';
										if($key == 'FINDIS') $select = 'selected';
										echo "<option value='$key' ".$select.">".$key." - ".$dt."</option>";
									} ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nilai Biaya</label>
									<input type="text" name="nilai_biaya" class="form-control">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Total Biaya</label>
									<input type="text" name="total_biaya" class="form-control" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Rekening Biaya</label>
									<input type="text" name="rek_biaya" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Data Statis Pembiayaan Murabahah</strong>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Status Piutang</label>
									<select name="stat_piutang" class="form-control">
										<option value="0">None</option>
										<option value="10">10 - Dalam Rangka Restrukturisasi</option>
										<option value="20" selected>20 - Bkn Dlm Restrukturisasi</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nomor Akad <span class="help-text"></span></label>
									<input type="text" name="no_akad" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tanggal Akad <span class="help-text"></span></label>
									<div class="datepicker-center">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-calendar"></i>
											</div>
											<input type="text" name="tgl_akad" class="form-control" placeholder="yyyy-mm-dd">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary" style="margin-left: 90%">
				Finish <i class="glyphicon glyphicon-ok"></i>
			</button>
		</div>
	</div>
		<?php } ?>
		</form>
	</div>
</div>