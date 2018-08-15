<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 4 - Pendaftaran Link Jaminan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<?php foreach($data->result() as $row){ ?>
			<?= form_open('admin/link/simpanData') ?>
			<div class="panel-body">
				<input type="hidden" name="nip" value="<?= $row->nip ?>">
				
				<div class="form-group row">
					<div class="col-md-4">
						<label>Kode Jaminan <span style="color: red">*</span></label>
						<input type="text" name="kode_jaminan" class="form-control" value="10" required>
					</div>
					<div class="col-md-4">
						<label>No. CIF Nasabah</label>
						<input type="text" name="cif_induk" class="form-control" value="<?= $row->cif_induk ?>" >
					</div>
					<div class="col-md-4">
						<label>Nasabah</label>
						<input type="text" name="cif_nsbh" class="form-control" value="<?= $row->cif ?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Tanggal Pencairan</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" name="tgl_cair" class="form-control" placeholder="yyyy-mm-dd" readonly>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label>Tanggal Jatuh Tempo</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" name="tgl_jth_tempo" class="form-control" value="<?= $row->tgl_jth_tempo ?>" readonly>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Frekuensi Review</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" name="frek_review" class="form-control" value="<?= $row->frek_review ?>" readonly>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
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
			<?= form_close(); ?>
			<?php } ?>
		</div>
	</div>
</div>