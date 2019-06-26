<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Pendaftaran Koperasi</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
			<div class="panel panel-default">
				<form class="form-horizontal" method="post" id="formValid" action="<?= site_url(ucfirst('maker/koperasi/simpan')) ?>">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">CIF Induk</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="cif_induk">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">NPWP</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="npwp">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Nama Koperasi</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="nama_kop">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">Rekening Agent</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="rek_agent">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">Mata Uang</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="mata_uang" value="IDR" readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Nominal Tersedia</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nominal" id="nominal">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-6">Tenor Bank <a href="#" class="btn-add-1">+</a></label>
									<div class="col-md-6 multiple-form-group-1">
										<div style="margin-bottom: 10px">
											<input type="text" name="tenor_bank[]" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-6">Rate Bank <a href="#" class="btn-add-2">+</a></label>
									<div class="col-md-6 multiple-form-group-2">
										<div style="margin-bottom: 10px">
											<input type="text" name="rate_bank[]" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="panel-footer">
						<div class="btn-groups">
							<a href="<?= site_url(ucfirst('maker/koperasi')) ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
							<button type="submit" class="btn btn-primary pull-right">
								Simpan <i class="glyphicon glyphicon-check"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>