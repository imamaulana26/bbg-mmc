<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 3 - Fasilitas Anak</h1>
    </div>
</div>

<div class="row">
	<div class="panel panel-default">
		<?= form_open('admin/anak/simpanData') ?>
		<?php foreach($data->result() as $row){ ?>
		<div class="panel-body">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Fasilitas dengan Agunan</strong>
					</div>
					<div class="panel-body">
						<input type="hidden" name="nip" value="<?= $row->nip ?>">

						<div class="form-group row">
							<div class="col-md-6">
								<label>Nama Nasabah</label>
								<input type="text" class="form-control" value="<?= $row->nama_nsbh ?>" readonly>
							</div>
							<div class="col-md-6">
								<label>Nama Koperasi</label>
								<input type="text" class="form-control" value="<?= $row->nama_kop ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label>Mata Uang</label>
								<input type="text" class="form-control" value="<?= $row->mata_uang ?>" readonly>
							</div>
							<div class="col-md-4">
								<label>Nominal Fasilitas</label>
								<input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
							</div>
							<div class="col-md-4">
								<label>Maks Penggunaan</label>
								<input type="text" class="form-control" value="<?= number_format($row->nom_max_guna, 0, '.', ',') ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-5">
								<label>Tanggal Pencairan</label>
								<div class="datepicker-center">
									<div class="input-group date">
										<input type="text" class="form-control" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" placeholder="yyyy-mm-dd" readonly>
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-calendar"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5 col-md-offset-2">
								<label>Tanggal Jatuh Tempo</label>
								<div class="datepicker-center">
									<div class="input-group date">
										<input type="text" class="form-control" value="<?= $row->tgl_jth_tempo ?>" readonly>
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-calendar"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-5">
								<label>Frekuensi Review</label>
								<div class="datepicker-center">
									<div class="input-group date">
										<input type="text" class="form-control" value="<?= $row->frek_review ?>" readonly>
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-calendar"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Keterangan BI untuk Fasilitas</strong>
					</div>
					<div class="panel-body">
						<div class="form-group row">
							<div class="col-md-12">
								<label>Orientasi Penggunaan</label>
								<div class="radio-inline">
									<label class="radio-inline">
										<input type="radio" name="orientasi" value="0">[None]
									</label>
									<label class="radio-inline">
										<input type="radio" name="orientasi" value="1">1 - Ekspor
									</label>
									<label class="radio-inline">
										<input type="radio" name="orientasi" value="9" checked>9 - Lainnya
									</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label>Sifat Piutang</label>
								<div class="radio-inline">
									<label class="radio-inline">
										<input type="radio" name="piutang" value="0">[None]
									</label>
									<label class="radio-inline">
										<input type="radio" name="piutang" value="1" checked>1 - Dengan Akad
									</label>
									<label class="radio-inline">
										<input type="radio" name="piutang" value="9">9 - Tanpa Akad
									</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label>Golongan Piutang</label>
								<input type="text" name="gol_piutang" class="form-control" value="19" required>
							</div>
							<div class="col-md-8">
								<label>Lokasi Proyek</label>
								<?php foreach($lokasi as $lok){
								if($lok->id == $row->lokasi_proyek){ ?>
									<input type="text" class="form-control" value="<?=$row->lokasi_proyek?> - <?=$lok->deskripsi?>" readonly>
								<?php } 
								} ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label>Jenis Penggunaan</label>
								<input type="text" name="jenis_guna" class="form-control" value="89" required>
							</div>
							<div class="col-md-4">
								<label>Sifat Pinjaman</label>
								<input type="text" name="sifat_pinjam" class="form-control" value="60">
							</div>
							<div class="col-md-4">
								<label>Tipe Penggunaan</label>
								<input type="text" name="tipe_guna" class="form-control" value="<?= $row->tipe_guna ?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<label>Sektor Ekonomi</label>
								<input type="text" name="sektor_ekon" class="form-control" value="<?= $row->sektor_ekonomi ?>">
							</div>
							<div class="col-md-6">
								<label>Baru/Perpanjangan</label>
								<select class="form-control" name="status">
									<option value="0" <?php if($row->status_cair == 0) echo "selected"; ?>>Baru</option>
									<?php for($i=1; $i<=5; $i++){
										echo "<option value='".$i."' ";
										if($i == $row->status_cair) echo "selected";
										echo ">Perpanjangan Ke-".$i."</option>";
									} ?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary" style="margin-left: 90%">
				Next <i class="glyphicon glyphicon-chevron-right"></i>
			</button>
		</div>
		<?php } ?>
		<?= form_close() ?>
	</div>
</div>