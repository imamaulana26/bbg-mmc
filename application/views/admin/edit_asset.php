<style type="text/css">
	.help-text:after{
		content: "*";
		color: red;
	}
</style>

<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Step 6 : Pendafataran Asset Murabahah</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<?php foreach($data->result() as $row){ ?>
			<form method="post" id="formValid" action="<?= site_url('admin/asset/simpanData') ?>">
			<div class="panel-body">
				<input type="hidden" name="nip" value="<?= $row->nip ?>">

				<div class="form-group">
					<label>GB Nama Asset Yang Dibiayai/Dibeli <span class="help-text"></span></label>
					<input type="text" name="nama_asset" class="form-control" value="<?= $row->nama_asset ?>">
				</div>
				<div class="form-group">
					<label>GB Keterangan Asset Yang Dibiayai/Dibeli <span class="help-text"></span></label>
					<input type="text" name="ket_asset" class="form-control" value="<?= $row->ket_asset ?>">
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Mata Uang <span class="help-text"></span></label>
							<input type="text" class="form-control" value="<?= $row->mata_uang ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Fasilitas Anak Nasabah</label>
							<input type="text" name="fas_anak" class="form-control" value="<?= $row->fas_anak ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Pemasok</label>
							<input type="text" class="form-control" value="<?= $row->nama_nsbh ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Rek. Pemasok / Rek. Nasabah <span class="help-text"></span></label>
							<input type="text" class="form-control" value="<?= $row->rek_nsbh ?>" readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nomor CIF</label>
							<input type="text" class="form-control" value="<?= $row->cif ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<label>Nomor CIF Pemasok</label>
						<input type="text" name="cif_pemasok" class="form-control" value="<?= $row->cif_pemasok ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Harga Asset yg Dibiayai/Dibeli</label>
							<input type="text" class="form-control" value="<?= number_format($row->harga_asset, 0, '.', ',') ?>" readonly>
							<input type="hidden" name="harga" id="harga" value="<?= $row->harga_asset ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Uang Muka</label>
							<input type="text" name="uang_muka" id="dp" class="form-control" value="<?= number_format($row->uang_muka, 0, '.', ',') ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Jumlah Asset Dibiayai/Dibeli <span class="help-text"></span></label>
							<input type="text" name="jumlah_asset" id="jumlah" class="form-control" value="<?= $row->jumlah_asset ?>" onkeyup="return getTotal()">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Total Asset Yang Dibiayai/Dibeli</label>
							<input type="text" name="total_asset" id="total" class="form-control" value="<?= number_format($row->total_asset, 0, '.', ',') ?>" readonly>
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
	function getTotal(){
		harga = document.getElementById('harga').value;
		jumlah = document.getElementById('jumlah').value;
		var uang_muka = $('#dp').val().replace(',','');
		var new_dp = uang_muka.split(',').join('');

		document.getElementById('total').value = numeral((harga*jumlah)-new_dp).format('0,0');
	}

	var dp = document.getElementById('dp');
	dp.addEventListener('keyup', function(evt){
		dp.value = numeral(this.value).format('0,0');
	});
</script>