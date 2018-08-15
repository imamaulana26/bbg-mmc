<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 2 - Fasilitas Induk</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<?php foreach($data->result() as $row){ ?>
			<?= form_open('admin/induk/simpanData') ?>
			<div class="panel-body">
				<input type="hidden" name="nip" value="<?= $row->nip ?>">
				<div class="form-group row">
					<div class="col-md-6">
						<label>Nama Nasabah</label>
						<input type="text" class="form-control" value="<?= $row->nama_nsbh ?>" readonly>
					</div>
					<div class="col-md-6">
						<label>Nominal Fasilitas</label>
						<input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, ',', '.') ?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label>Mata Uang <span style="color: red">*</span></label>
						<input type="text" name="uang" class="form-control" value="<?= $row->mata_uang ?>">
					</div>
					<div class="col-md-6 col-md-offset-3">
						<label>Maksimal Penggunaan</label>
						<input type="text" name="maks_guna" id="maks_guna" class="form-control" value="<?= number_format($row->nom_max_guna, 0, ',', '.') ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-5">
						<label>Tanggal Nota</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" name="tgl_nota" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_nota ?>" required>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-2">
						<label>Tanggal SP3</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_sp3 ?>" readonly>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-5">
						<label>Tanggal Pencairan</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" name="tgl_cair" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" readonly>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-md-offset-2">
						<label>Tgl. Jatuh Tempo</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" class="form-control" value="<?= $row->tgl_jth_tempo ?>" placeholder="yyyy-mm-dd" readonly>
								<div class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-8">
						<label>Segmentasi Kriteria</label>
						<select name="segmen" class="form-control">
							<?php $list = array('BPR/BPRS', 'Lembaga keuangan mikro (KJKS, BMT)', 'Koperasi utk tujuan konsumer', 'Koperasi utk tujuan produktif', 'Multifinance dgn pola chanelling', 'Pembiayaan program', 'Pembiayaan dgn pola kemitraan', 'BUMD & anak perusahaan', 'BUMN & anak perusahaan', 'Lembaga pendidikan', 'Lembaga negara non-kementrian', 'Rumah sakit/klinik', 'Pembiayaan konsumer', 'Pembiayaan produktif dgn GAS tertentu', 'Badan usaha');
							foreach($list as $key=>$li){
								$select = '';
								if(($key+1) == $row->segmen){
									$select = 'selected';
								}
								echo "<option value='".($key+1)."' ".$select.">".($key+1)." - ".$li."</option>";
							} ?>
						</select>
					</div>
					<div class="col-md-4">
						<label>Rating Internal</label>
						<input type="text" name="rating_int" class="form-control" value="<?= $row->rating_int ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-5">
						<label>Rating Eksternal</label>
						<?php if($row->rating_eks == 169){
							echo "<input type='text' name='rating_eks' class='form-control' value='$row->rating_eks - Tidak ada rating'>";
						} else {
							echo "<input type='text' name='rating_eks' class='form-control' value='$row->rating_eks'>";
						} ?>
					</div>
					<div class="col-md-5 col-md-offset-2">
						<label>Frekuensi Review</label>
						<div class="datepicker-center">
							<div class="input-group date">
								<input type="text" class="form-control" value="<?= $row->frek_review ?>" placeholder="yyyy-mm-dd" readonly>
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

<script type="text/javascript">
	$(document).ready(function(){
		var maks_guna = document.getElementById('maks_guna');
        maks_guna.addEventListener('keyup', function(evt){
            maks_guna.value = formatRp(this.value);
        });
	});
</script>