<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Step 7 : Pendaftaran Kontrak (LD)</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
			<div class="panel panel-default">
				<?php foreach($data->result() as $row){ ?>
				<form method="post" id="formValid" action="<?= site_url(ucfirst('maker/kontrak/simpanData')) ?>" class="form-horizontal">
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#tab-1">Layar Input Pembiayaan Financing</a></li>
						<li><a data-toggle="tab" href="#tab-2">Data Statis Pembiayaan Murabahah</a></li>
					</ul>
					<div class="tab-content">
						<div id="tab-1" class="tab-pane fade in active">
							<input type="hidden" name="no_fos" value="<?= $row->no_fos ?>">
							<input type="hidden" name="nip" value="<?= $row->nip_member_kop ?>"><br>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Nomor CIF <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->cif ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Tgl. Angsuran</label>
										<div class="col-md-2">
											<input type="text" class="form-control" value="<?= $row->tgl_angsuran ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Mata Uang</label>
										<div class="col-md-2">
											<input type="text" class="form-control" value="<?= $row->mata_uang ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Tipe Produk <span class="help-text"></span></label>
										<div class="col-md-6">
											<select name="tipe_produk" class="form-control selectpicker" data-live-search="true">
												<option value="MUR0019" selected>MUR0019</option>
											<?php foreach($produk as $li){
												echo "<option value='$li->id'>".$li->id." - ".$li->deskripsi."</option>";
											} ?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Kode Unit Kerja <span class="help-text"></span></label>
										<div class="col-md-4">
											<select name="kode_unit" class="form-control selectpicker">
											<?php $list = array(38=>'BBG B to B', 39=>'BBG B to C');
											foreach($list as $key=>$li){
												if($key == 38){
													echo "<option value='$key' selected>".$key." - ".$li."</option>";
												} else{
													echo "<option value='$key' disabled>".$key." - ".$li."</option>";
												}
											} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Nilai Maksimal Penggunaan</label>
										<div class="col-md-5">
											<input type="text" id="maks_guna" class="form-control" value="<?= number_format($row->nom_max_guna, 0, '.', ',') ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Kode AO Marketing <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->kode_ao ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Kode AO Risk Officer</label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->kode_fao ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Kode AO Pimpinan Cabang</label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->kode_pim ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Tipe Angsuran <span class="help-text"></span></label>
										<div class="col-md-4">
											<select name="tipe_angsuran" class="form-control selectpicker">
											<?php $tipe = array('Efektif Tetap','Efektif Sliding','Flat','Proposional','Irregular','Anuitas Ulang Tahun');
											foreach($tipe as $key=>$id){
												if($key+1 == 1){
													echo "<option value='".($key+1)."' selected>".($key+1)." - ".$id."</option>";
												} else{
													echo "<option value='".($key+1)."' disabled>".($key+1)." - ".$id."</option>";
												}
											} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Tenor (bulan) <span class="help-text"></span></label>
										<div class="col-md-2">
											<input type="text" class="form-control" id="tenor" value="<?= $row->tenor ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Pengusul Pembiayaan <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" name="pengusul" class="form-control" value="<?= $row->pengusul ?>">
										</div>
									</div>
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Rate Fee Agent</label>
										<div class="col-md-2">
											<input type="text" class="form-control" readonly>
										</div>
										<p class="text-muted control-label">akan disuplai corebanking</p>
									</div>
								</div> -->
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Pemutus Pembiayaan <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" name="pemutus" class="form-control" value="<?= $row->pemutus ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Rekening Agent</label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->rek_agent ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Segmentasi Produk <span class="help-text"></span></label>
										<div class="col-md-6">
											<select name="segmen_produk" class="form-control selectpicker">
											<?php $list = array('CONS'=>'Konsumer (Konsumtif)', 'INV'=>'Investasi (Produktif)', 'WCAP'=>'Modal Kerja (Produktif)');
											foreach($list as $key=>$li){
												$select = '';
												if($key == 'CONS') $select = 'selected';
												echo "<option value='$key' ".$select.">".$key." - ".$li."</option>";
											} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Rekening Pokok <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->rek_pokok ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Rekening Nasabah <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?= $row->rek_nsbh ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Rekening Margin <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" name="rek_margin" class="form-control" value="<?= $row->rek_margin ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Total Biaya</label>
										<div class="col-md-5">
											<input type="text" name="total_biaya" id="total_biaya" class="form-control" value="<?= number_format($row->total_biaya, 0, '.', ',') ?>" readonly>
										</div>
									</div>
								</div> -->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Rekening Biaya <span class="help-text"></span></label>
										<div class="col-md-4">
											<input type="text" name="rek_biaya" class="form-control" value="<?= $row->rek_nsbh ?>" readonly>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
			            		<div class="col-md-6">
			            			<div class="form-group">
			            				<label class="control-label col-md-4">Penanda Wakalah <span class="help-text"></span></label>
			            				<div class="col-md-8">
			            					<label class="radio-inline">
			            						<input type="radio" name="wakalah" value="NO" <?php if($row->wakalah == "NO") echo "checked"; ?> >NO
			            					</label>
			            					<label class="radio-inline">
			            						<input type="radio" name="wakalah" value="YES" <?php if($row->wakalah == "YES") echo "checked"; ?> >YES
			            					</label>
			            				</div>
			            			</div>
			            		</div>
			            	</div>

			            	<div class="row">
			            		<div class="col-md-6">
			            			<div class="form-group">
			            				<label class="control-label col-md-4">Tipe Margin <span class="help-text"></span></label>
			            				<div class="col-md-8">
			            					<label class="radio-inline">
												<input type="radio" name="tipe_margin" value="1" <?php if($row->tipe_margin == 1) echo "checked"; ?> >1 - Margin Single
											</label>
											<label class="radio-inline">
												<input type="radio" name="tipe_margin" value="2" <?php if($row->tipe_margin == 2) echo "checked"; ?> >2 - Margin Bertingkat
											</label>
			            				</div>
			            			</div>
			            		</div>
			            	</div>

			            	<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">% Pricing</label>
										<div class="col-md-3">
											<input type="text" name="margin" id="margin" class="form-control" value="<?= $row->margin ?>">
										</div>
										<p class="control-label text-muted">Ex. 15.00</p>
									</div>
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Total Margin</label>
										<div class="col-md-5">
											<input type="text" name="total_margin" id="total_margin" class="form-control" value="<?= number_format($row->total_margin, 0, '.', ',') ?>" readonly>
										</div>
									</div>
								</div> -->
							</div>

							<div class="row">
			            		<div class="col-md-6">
			            			<div class="form-group">
			            				<label class="control-label col-md-4">Biaya Teratribusi <span class="help-text"></span></label>
			            				<div class="col-md-8">
			            					<label class="radio-inline">
												<input type="radio" name="teratribusi" value="N" <?php if($row->teratribusi == "N") echo "checked"; ?> >NO
											</label>
											<label class="radio-inline">
												<input type="radio" name="teratribusi" value="Y" <?php if($row->teratribusi == "Y") echo "checked"; ?> >YES
											</label>
			            				</div>
			            			</div>
			            		</div>
			            	</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Kode Biaya <a href="" class="btn-add-1">+</a></label>
										<div class="col-md-8 multiple-form-group-1">
										<?php $exp = explode("::", $row->kode_biaya);
										$jmlh = count($exp);
										if($exp[0]){ ?>
											<div style="margin-bottom: 10px">
											<select name="kode_biaya[]" class="form-control">
												<option selected disabled>-- Pilih --</option>
											<?php $list = array('FINAPP'=>'Biaya Penilalaian','FINDIS'=>'Biaya Pencairan Murabahah','FININS'=>'Biaya Asuransi','FINNTRY'=>'Biaya Notaris','FINOTH'=>'Biaya Lain - lain','FINSMTP'=>'Biaya Materai');
											foreach($list as $key=>$li){
												if($key == $exp[0]){
													echo "<option value='".$key."' selected>".$key." - ".$li."</option>";
												} else{
													echo "<option value='".$key."'>".$key." - ".$li."</option>";
												}
											} ?>
											</select>
											</div>
										<?php }
										for($i=1; $i<$jmlh; $i++){ ?>
											<div class="input-group" style="margin-bottom: 10px">
											<select name="kode_biaya[]" class="form-control">
												<option selected disabled>-- Pilih --</option>
											<?php $list = array('FINAPP'=>'Biaya Penilalaian','FINDIS'=>'Biaya Pencairan Murabahah','FININS'=>'Biaya Asuransi','FINNTRY'=>'Biaya Notaris','FINOTH'=>'Biaya Lain - lain','FINSMTP'=>'Biaya Materai');
											foreach($list as $key=>$li){
												if($key == $exp[$i]){
													echo "<option value='".$key."' selected>".$key." - ".$li."</option>";
												} else{
													echo "<option value='".$key."'>".$key." - ".$li."</option>";
												}
											} ?>
											</select><div class="input-group-addon btn btn-danger btn-remove">-</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Nilai Biaya</label>
										<div class="col-md-5 multiple-form-group-2">
										<?php $exp = explode("::", $row->nom_biaya);
										$jmlh = count($exp);
										if($exp[0]){ ?>
											<div style="margin-bottom: 10px">
											<input type="text" name="nilai_biaya[]" value="<?= number_format($exp[0], 0, '.', ',') ?>" class="form-control">
										</div>
										<?php }
										for($i=1; $i<$jmlh; $i++){ ?>
										<div class="input-group" style="margin-bottom: 10px">
											<input type="text" name="nilai_biaya[]" value="<?= number_format($exp[$i], 0, '.', ',') ?>" class="form-control">
											<div class="input-group-addon btn btn-remove btn-danger">-</div>
										</div>
										<?php } ?>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="tab-2" class="tab-pane fade in"><br>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Status Piutang <span class="help-text"></span></label>
										<div class="col-md-8">
											<label class="radio-inline">
												<input type="radio" name="stat_piutang" value="10" <?php if($row->status_piutang == 10) echo 'checked' ?> >10 - Dlm Rangka Restrukturisasi
											</label>
											<label class="radio-inline">
												<input type="radio" name="stat_piutang" value="20" <?php if($row->status_piutang == 20) echo 'checked' ?> >20 - Bkn Dlm Rangka Restrukturisasi
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Orientasi Penggunaan</label>
										<div class="col-md-8">
											<label class="radio-inline">
												<input type="radio" name="orientasi" disabled>[None]
											</label>
											<label class="radio-inline">
												<input type="radio" name="orientasi" value="1" <?php if($row->orientasi == 1) echo 'checked' ?> >1 - Ekspor
											</label>
											<label class="radio-inline">
												<input type="radio" name="orientasi" value="9" <?php if($row->orientasi == 9) echo 'checked' ?> >9 - Lainnya
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Sifat Piutang</label>
										<div class="col-md-8">
											<label class="radio-inline">
												<input type="radio" name="piutang" disabled>[None]
											</label>
											<label class="radio-inline">
												<input type="radio" name="piutang" value="1" <?php if($row->sifat_piutang == 1) echo 'checked' ?> >1 - Dengan Akad
											</label>
											<label class="radio-inline">
												<input type="radio" name="piutang" value="9" <?php if($row->sifat_piutang == 9) echo 'checked' ?> >9 - Tanpa Akad
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Kategori Portofolio <span class="help-text"></span></label>
										<div class="col-md-4">
											<select name="portofolio" class="form-control selectpicker">
											<?php $list = array(10 => 'Tagihan Kepada Pemerintah Indonesia',11 => 'Tagihan Kepada Pemerintah Negara Lain',12 => 'Tagihan kpd Bank Pembangunan Multilateral',13 => 'Tagihan kpd Bank Pembangunan Multilateral Lainnya',14 => 'Tagihan kpd Bank Jk. Pendek (Antarbank =< 3 bulan)',15 => 'Tagihan kpd Bank Jk. Panjang (Antarbank > 3 bulan)',16 => 'Tagihan kpd Entitas Sektor Publik (BUMN,BUMD,Pemda)',35 => 'Tagihan Kepada Korperasi',36 => 'Tagihan kpd Usaha Mikro/Kecil & Portofolio Ritel',37 => 'Pembiayaan KPR Rumah Tgl - Financing To Value <70%',38 => 'Pembiayaan KPR Rumah Tinggal - 70% < FTV < 80%',39 => 'Pembiayaan KPR Rumah Tinggal - 80% < FTV < 95%',40 => 'Pembiayaan PNS/Pensiunan (TNI/POLRI,& BUMN/BUMD)',42 => 'Pembiayaan Beragun Properti Komersial',60 => 'Pembiayaan NPF (Past Due > 90 hari) KPR',62 => 'Pembiayaan NPF (Past due > 90 hari) Selain KPR',70 => 'Eksposur Sekuritisasi');
											foreach($list as $key=>$li){
												if($key == $row->portofolio){
													echo "<option value='$key' selected>".$key." - ".$li."</option>";
												} else{
													echo "<option value='$key' disabled>".$key." - ".$li."</option>";
												}
											} ?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Lokasi Proyek <span class="help-text"></span></label>
										<div class="col-md-6">
											<?php foreach($lokasi as $lok){
											if($lok->id == $row->lokasi_proyek){ ?>
												<input type="text" class="form-control" value="<?=$lok->id?> - <?=$lok->deskripsi?>" readonly>
											<?php } 
											} ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Sektor Ekonomi <span class="help-text"></span></label>
										<div class="col-md-6">
											<?php foreach($sektor as $sek){
											if($sek->id == $row->sektor_ekonomi){ ?>
												<input type="text" class="form-control" value="<?=$sek->id?> - <?=$sek->deskripsi?>" readonly>
											<?php } 
											} ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Jenis Penggunaan <span class="help-text"></span></label>
										<div class="col-md-4">
											<?php foreach($li_guna as $key=>$li){
												if($key == $row->jenis_guna){
													echo "<input type='text' class='form-control' value='$key - $li' readonly>";
												}
											} ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Nomor Akad <span class="help-text"></span></label>
										<div class="col-md-2">
											<input type="text" name="no_akad" class="form-control" value="<?= $row->no_akad ?>">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-4">Tanggal Akad <span class="help-text"></span></label>
										<div class="col-md-5">
											<div class="datepicker-center">
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="glyphicon glyphicon-calendar"></i>
													</div>
													<input type="text" name="tgl_akad" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_akad ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-groups">
							<a href="<?= site_url(ucfirst('maker/asset/edit_asset/')).$row->no_fos ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
							<button type="submit" class="btn btn-primary pull-right">
								Finish <i class="glyphicon glyphicon-ok"></i>
							</button>
						</div>
						</div>
					</div>
				</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		var rate_bank = document.getElementById('rate_bank');
		var tenor = document.getElementById('tenor');
		var maks_guna = document.getElementById('maks_guna');
		var sum_margin = document.getElementById('total_margin');
		var margin = document.getElementById('margin');
		<?php /*margin.addEventListener('keyup', function(evt){
			margin.value = this.value;

			var val = maks_guna.value.replace(',','');
			var new_val = val.split(',').join('');
			sum_margin.value = numeral((new_val*margin.value)/100*tenor.value/12).format('0,0');		
		});*/

		/*var biaya = document.getElementById('nilai_biaya');
		var sum_biaya = document.getElementById('total_biaya');
		biaya.addEventListener('keyup', function(evt){
			biaya.value = numeral(this.value).format('0,0');
			sum_biaya.value = numeral(this.value).format('0,0');
		});*/ ?>

		var list = {'FINAPP': 'Biaya Penilalaian','FINDIS': 'Biaya Pencairan Murabahah','FININS': 'Biaya Asuransi','FINNTRY': 'Biaya Notaris','FINOTH': 'Biaya Lain - lain','FINSMTP': 'Biaya Materai'};

		var max = 6;
		var wrapper1 = $('.multiple-form-group-1');
		var wrapper2 = $('.multiple-form-group-2');
		var add_field1 = $('.btn-add-1');

		var x1 = 1;
		var opt = "<option selected disabled>-- Pilih --</option><option value='FINAPP'>FINAPP - Biaya Penilalaian</option><option value='FINDIS'>FINDIS - Biaya Pencairan Murabahah</option><option value='FININS'>FININS - Biaya Asuransi</option><option value='FINNTRY'>FINNTRY - Biaya Notaris</option><option value='FINOTH'>FINOTH - Biaya Lain - lain</option><option value='FINSMTP'>FINSMTP - Biaya Materai</option>";
		var text = "<div class='input-group' style='margin-bottom: 10px'><select name='kode_biaya[]' class='form-control'>"+opt+"</select><div class='input-group-addon btn btn-danger btn-remove'>-</div></div>";

		var text1 = "<div class='input-group' style='margin-bottom: 10px'><input type='text' name='nilai_biaya[]' class='form-control'><div class='input-group-addon btn btn-remove btn-danger'>-</div></div>";


		$(add_field1).click(function(evt){
			evt.preventDefault();
			if($('#formValid').find(':visible[name="kode_biaya[]"]').length < max){
				x1++;
				$(wrapper1).append(text);
				$(wrapper2).append(text1);
			} else{
				alert('You Reached the limits');
			}
		});

		$('body').on('click', '.btn-remove', function(evt){
			$(this).parents('.input-group').remove();
		});

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
				tgl_angsuran: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				kode_unit: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				tipe_produk: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				segmen_produk: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				tipe_angsuran: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				pengusul: {
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
				pemutus: {
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
				rate_agent: {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: numb
						},
						stringLength: {
							max: 3
						}
					}
				},
				rek_margin: {
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
				margin: {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: /^[0-9.]+$/
						}
					}
				},
				kode_biaya: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				nilai_biaya: {
                    validators: {
                        regexp: {
                            regexp: /^[0-9,]+$/,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 19
                        },
                        callback: {
                            callback: function(value, validator, $field){
                                var val = $field.val()
                                if(val != 0){
                                    return true;
                                } else{
                                    return {
                                        valid: false,
                                        message: 'This value is not valid'
                                    }
                                }
                            }
                        }
                    }
                },
                no_akad: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringLength: {
							max: 30
						},
						stringCase: {
							'case': 'upper'
						}
					}
				},
				tgl_akad: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				}
			}
		});

		$('.input-group.date').on('changeDate show', function(e){
			$('#formValid').bootstrapValidator('revalidateField', 'tgl_akad');
		});
	});
</script> -->