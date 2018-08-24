<style type="text/css">
	.help-text:after{
		content: "*";
		color: red;
	}
</style>

<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Step 5 : Pendafataran Nilai Jaminan</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<?php foreach($data->result() as $row){ ?>
			<form method="post" id="formValid" action="<?= site_url('admin/jaminan/simpanData') ?>">
			<div class="panel-body">
				<input type="hidden" name="nip" value="<?= $row->nip ?>">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tipe Jaminan <span class="help-text"></span></label>
							<input type="text" name="tipe_jaminan" class="form-control" value="<?= $row->tipe_jaminan ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kode Jaminan</label>
							<input type="text" class="form-control" value="<?= $row->kode_jaminan ?>" readonly>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<input type="text" name="deskripsi" class="form-control" value="<?= $row->deskripsi ?>">
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Mata Uang <span class="help-text"></span></label>
							<input type="text" class="form-control" value="<?= $row->mata_uang ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Negara</label>
							<input type="text" name="negara" class="form-control" value="<?= $row->negara ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Taksasi <span class="help-text"></span></label>
							<div class="datepicker-center">
								<div class="input-group date">
									<input type="text" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" readonly>
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Frekuensi Review</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<input type="text" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->frek_review ?>" readonly>
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nilai Pasar <span class="help-text"></span></label>
							<input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nilai Likuidasi <span class="help-text"></span></label>
							<input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nilai Jual Objek Pajak (NJOP)</label>
							<input type="text" name="njop" id="njop" class="form-control" value="<?= number_format($row->njop, 0, '.', ',') ?>">
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
	var njop = document.getElementById('njop');
	njop.addEventListener('keyup', function(evt){
		njop.value = numeral(this.value).format('0,0');
	});
</script>