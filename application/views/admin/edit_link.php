<style type="text/css">
	.text-help:after{
		content: "*";
		color: red;
	}
</style>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 4 - Pendaftaran Link Jaminan</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<?php foreach($data->result() as $row){ ?>
			<form method="post" id="formValid" action="<?= site_url('admin/link/simpanData') ?>">
			<div class="panel-body">
				<input type="hidden" name="nip" value="<?= $row->nip ?>">
				
				<div class="row">
					<div class="col-md-4 ">
						<div class="form-group">
							<label>Kode Jaminan <span class="text-help"></span></label>
							<input type="text" name="kode_jaminan" class="form-control" value="10">
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="form-group">
							<label>No. CIF Nasabah</label>
							<input type="text" name="cif_induk" class="form-control" value="<?= $row->cif_induk ?>" readonly>
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="form-group">
							<label>Nasabah</label>
							<input type="text" name="cif_nsbh" class="form-control" value="<?= $row->cif ?>" readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
						<div class="form-group">
							<label>Tanggal Pencairan</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<input type="text" name="tgl_cair" id="tgl_cair" class="form-control" placeholder="yyyy-mm-dd" readonly>
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 ">
						<div class="form-group">
							<label>Tanggal Jatuh Tempo</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<input type="text" name="tgl_jth_tempo" id="tgl_jth_tempo" class="form-control" value="<?= $row->tgl_jth_tempo ?>" readonly>
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
						<div class="form-group">
							<label>Frekuensi Review</label>
							<div class="datepicker-center">
								<div class="input-group date">
									<input type="text" name="frek_review" id="frek_review" class="form-control" value="<?= $row->frek_review ?>" readonly>
									<div class="input-group-addon">
										<i class="glyphicon glyphicon-calendar"></i>
									</div>
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
	$(document).ready(function(){
		$('#formValid').bootstrapValidator({
			message: 'This value is not valid',
			fields: {
				kode_jaminan: {
					validators: {
						notEmpty: {
							message: 'This field is required and can\'t be empty'
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'This field is must be numbers'
						},
						stringLength: {
							max: 3,
							message: 'This field is must be less than 3 characters long'
						}
					}
				}
			}
		});
	});
</script>