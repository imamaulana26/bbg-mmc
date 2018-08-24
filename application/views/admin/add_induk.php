<style type="text/css">
	.help-text:after{
		content: "*";
		color: red;
	}

	#formValid .dateContainer .form-control-feedback{
		top: 25px;
	}
</style>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 2 - Fasilitas Induk</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<?php foreach($data->result() as $row){ ?>
			<form method="post" id="formValid" action="<?= site_url('admin/induk/simpanData') ?>">
			<div class="panel-body">
				<input type="hidden" name="nip" value="<?= $row->nip ?>">
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Nasabah</label>
							<input type="text" class="form-control" value="<?= $row->nama_nsbh ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nominal Fasilitas</label>
							<input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Mata Uang <span class="help-text"></span></label>
							<input type="text" name="uang" class="form-control" value="IDR">
						</div>
					</div>
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group">
							<label>Maksimal Penggunaan</label>
							<input type="text" name="maks_guna" id="maks_guna" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Tanggal Nota</label>
							<div class="datepicker-center dateContainer">
								<div class="input-group date" id="date_nota">
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
									<input type="text" name="tgl_nota" class="form-control" placeholder="yyyy-mm-dd">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-2">
						<div class="form-group">
							<label>Tanggal SP3</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
									<input type="text" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_sp3 ?>" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Tanggal Pencairan</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
									<input type="text" name="tgl_cair" class="form-control" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" placeholder="yyyy-mm-dd" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-2">
						<div class="form-group">
							<label>Tgl. Jatuh Tempo</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
									<input type="text" class="form-control" value="<?= $row->tgl_jth_tempo ?>" placeholder="yyyy-mm-dd" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Segmentasi Kriteria</label>
							<select name="segmen" class="form-control">
								<?php $list = array('BPR/BPRS', 'Lembaga keuangan mikro (KJKS, BMT)', 'Koperasi utk tujuan konsumer', 'Koperasi utk tujuan produktif', 'Multifinance dgn pola chanelling', 'Pembiayaan program', 'Pembiayaan dgn pola kemitraan', 'BUMD & anak perusahaan', 'BUMN & anak perusahaan', 'Lembaga pendidikan', 'Lembaga negara non-kementrian', 'Rumah sakit/klinik', 'Pembiayaan konsumer', 'Pembiayaan produktif dgn GAS tertentu', 'Badan usaha');
								foreach($list as $key=>$li){
									if(($key+1) == 13){
										echo "<option value='".($key+1)."' selected>".($key+1)." - ".$li."</option>";
									} else{
										echo "<option value='".($key+1)."'>".($key+1)." - ".$li."</option>";
									}
								} ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Rating Internal</label>
							<input type="text" name="rating_int" class="form-control" value="NO">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Rating Eksternal</label>
							<input type="text" name="rating_eks" class="form-control" value="169 - Tidak ada rating">
						</div>
					</div>
					<div class="col-md-5 col-md-offset-2">
						<div class="form-group">
							<label>Frekuensi Review</label>
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
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary" style="margin-left: 85%">
					Next <i class="glyphicon glyphicon-chevron-right"></i>
				</button>
			</div>
			</form>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
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
				}
			}
		});

		$('.input-group.date').on('changeDate show', function(e){
			$('#formValid').bootstrapValidator('revalidateField', 'tgl_nota');
		});
	});
</script>