<div id="page-wrapper">
	<div class="row">
	    <div class="col-md-12">
	        <h1 class="page-header">Step 2 - Fasilitas Induk</h1>
	    </div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
			<div class="panel panel-default">
				<?php foreach($data->result() as $row){ ?>
				<form method="post" id="formValid" action="<?= site_url(ucfirst('maker/induk/simpanData')) ?>" class="form-horizontal">
				<div class="panel-body">
					<input type="hidden" name="no_fos" value="<?= $row->no_fos ?>">
					<input type="hidden" name="nip" value="<?= $row->nip_member_kop ?>">

					<div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                	<label class="control-label col-md-4">Nama Nasabah</label>
			                	<div class="col-md-8">
			                		<input type="text" class="form-control" value="<?= $row->nama_nsbh ?>" readonly>
			                	</div>
			                </div>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                	<label class="control-label col-md-4">Mata Uang <span class="help-text"></span></label>
			                	<div class="col-md-3">
			                		<input type="text" name="uang" class="form-control" value="<?= $row->mata_uang ?>">
			                	</div>
			                </div>
	                	</div>
	                </div>

					<div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label class="control-label col-md-4">Tanggal Nota</label>
	                            <div class="col-md-5">
	                                <div class="datepicker-center">
	                                    <div class="input-group date">
	                                        <div class="input-group-addon">
	                                            <i class="glyphicon glyphicon-calendar"></i>
	                                        </div>
	                                        <input type="text" name="tgl_nota" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_nota ?>">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label class="control-label col-md-4">Nominal Fasilitas</label>
	                            <div class="col-md-6">
	                                <input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label class="control-label col-md-4">Tanggal SP3</label>
	                            <div class="col-md-5">
	                                <div class="datepicker-center">
	                                    <div class="input-group date">
	                                        <div class="input-group-addon">
	                                            <i class="glyphicon glyphicon-calendar"></i>
	                                        </div>
	                                        <input type="text" name="tgl_cair" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_sp3 ?>" readonly>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label class="control-label col-md-4">Maksimal Penggunaan</label>
	                            <div class="col-md-6">
	                            <?php if($row->nom_fasilitas == $row->nom_max_guna){
									echo "<input type='text' class='form-control' name='maks_guna' id='maks_guna' value='".number_format($row->nom_fasilitas, 0, '.', ',')."'>";
								} else {
									echo "<input type='text' class='form-control' name='maks_guna' id='maks_guna' value='".number_format($row->nom_max_guna, 0, '.', ',')."'>";
								} ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label class="control-label col-md-4">Tanggal Pencairan</label>
	                            <div class="col-md-5">
	                                <div class="datepicker-center">
	                                    <div class="input-group date">
	                                        <div class="input-group-addon">
	                                            <i class="glyphicon glyphicon-calendar"></i>
	                                        </div>
	                                        <input type="text" name="tgl_cair" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" readonly>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                    	<div class="form-group">
	                    		<label class="control-label col-md-4">Segmentasi Kriteria </label>
	                    		<div class="col-md-8">
	                    			<select name="segmen" class="form-control selectpicker">
									<?php $list = array('BPR/BPRS', 'Lembaga keuangan mikro (KJKS, BMT)', 'Koperasi utk tujuan konsumer', 'Koperasi utk tujuan produktif', 'Multifinance dgn pola chanelling', 'Pembiayaan program', 'Pembiayaan dgn pola kemitraan', 'BUMD & anak perusahaan', 'BUMN & anak perusahaan', 'Lembaga pendidikan', 'Lembaga negara non-kementrian', 'Rumah sakit/klinik', 'Pembiayaan konsumer', 'Pembiayaan produktif dgn GAS tertentu', 'Badan usaha');
									foreach($list as $key=>$li){
										if(($key+1) == 13){
											echo "<option value='".($key+1)."' selected>".($key+1)." - ".$li."</option>";
										} else{
											echo "<option value='".($key+1)."' disabled>".($key+1)." - ".$li."</option>";
										}
									} ?>
									</select>
	                    		</div>
	                    	</div>
	                    </div>
	                </div>

	                <div class="row">
	                	<div class="col-md-6 col-md-offset-6">
	                		<div class="form-group">
			                	<label class="control-label col-md-4">Rating Internal <span class="help-text"></span></label>
			                	<div class="col-md-3">
			                		<select name="rating_int" class="form-control selectpicker">
									<?php $list = array('NO','A','AA','AAA','BBB');
									foreach($list as $li ){
										if($li == 'NO'){
											echo "<option value='$li' selected>".$li."</option>";
										} else{
											echo "<option value='$li' disabled>".$li." - Rating ".$li."</option>";
										}
									} ?>
									</select>
			                	</div>
			                </div>
	                	</div>
	                </div>

	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label class="control-label col-md-4">Tanggal Jatuh Tempo</label>
	                            <div class="col-md-5">
	                                <div class="datepicker-center">
	                                    <div class="input-group date">
	                                        <div class="input-group-addon">
	                                            <i class="glyphicon glyphicon-calendar"></i>
	                                        </div>
	                                        <input type="text" name="tgl_jth_tempo" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_jth_tempo ?>" readonly>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                    	<div class="form-group">
	                    		<label class="control-label col-md-4">Rating Eksternal </label>
	                    		<div class="col-md-5">
	                    			<input type="text" name="rating_eks" class="form-control" value="169 - Tidak ada rating" readonly>
	                    		</div>
	                    	</div>
	                    </div>
	                </div>

	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
			                	<label class="control-label col-md-4">Frekuensi Review</label>
			                	<div class="col-md-5">
			                		<div class="datepicker-center">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-calendar"></i>
											</div>
											<input type="text" class="form-control" value="<?= $row->frek_review ?>" placeholder="yyyy-mm-dd" readonly>
										</div>
									</div>
			                	</div>
			                </div>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
	                			<label class="control-label col-md-4">Nama Pasangan</label>
	                			<div class="col-md-8">
	                				<input type="text" name="nama_pasangan" class="form-control" value="<?= $row->nama_pasangan ?>">
	                			</div>
	                		</div>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="col-md-6">
	                		<div class="form-group">
	                			<label class="control-label col-md-4">Tempat Lahir Pasangan</label>
	                			<div class="col-md-5">
	                				<input type="text" name="tempat_pasangan" class="form-control" value="<?= $row->tempat_pasangan ?>">
	                			</div>
	                		</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
	                			<label class="control-label col-md-4">Tanggal Lahir Pasangan</label>
	                			<div class="col-md-5">
			                		<div class="datepicker-center">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-calendar"></i>
											</div>
											<input type="text" name="tgl_pasangan" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_pasangan == '0000-00-00' ? '' : $row->tgl_pasangan ?>">
										</div>
									</div>
			                	</div>
	                		</div>
	                	</div>
	                </div>

				</div>
				<div class="panel-footer">
					<div class="btn-groups">
						<a href="<?= site_url(ucfirst('maker/input/edit_input/')).$row->no_fos ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
						<button type="submit" class="btn btn-primary pull-right">
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
	var maks_guna = document.getElementById('maks_guna');
	maks_guna.addEventListener('keyup', function(evt){
    	maks_guna.value = numeral(this.value).format('0,0');
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
				uang: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						regexp: {
							regexp: char
						},
						stringLength: {
							max: 3
						}
					}
				},
				maks_guna: {
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
						}
					}
				},
				tgl_nota: {
					validators: {
						notEmpty: {
							message: msg
						},
						date: {
							format: 'YYYY-MM-DD'
						}
					}
				},
				segmen: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				rating_int: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				nama_pasangan: {
					validators: {
						stringCase: {
							'case': 'upper'
						},
						regexp: {
							regexp: char
						},
						stringLength: {
							max: 50
						}
					}
				},
				tempat_pasangan: {
					validators: {
						stringCase: {
							'case': 'upper'
						},
						regexp: {
							regexp: char
						},
						stringLength: {
							max: 20
						}
					}
				},
				tgl_pasangan: {
					validators: {
						date: {
							format: 'YYYY-MM-DD'
						}
					}
				}
			}
		});

		$('.input-group.date').on('changeDate show', function(e){
			$('#formValid').bootstrapValidator('revalidateField', 'tgl_nota');
			$('#formValid').bootstrapValidator('revalidateField', 'tgl_pasangan');
		});
	});
</script> -->