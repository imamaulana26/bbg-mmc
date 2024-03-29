<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Step 3 - Fasilitas Anak</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
            <div class="panel panel-default">
                <form action="<?= site_url(ucfirst('maker/anak/simpanData')) ?>" id="formValid" method="post" class="form-horizontal">
                <?php foreach($data->result() as $row){ ?>
                <div class="panel-body">
                    <input type="hidden" name="nip" value="<?= $row->nip_member_kop ?>">
                    <input type="hidden" name="no_fos" value="<?= $row->no_fos ?>">
                    
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
                                <label class="control-label col-md-4">Nama Koperasi</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $row->nama_kop ?>" readonly>
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
                                <label class="control-label col-md-4">Nominal Fasilitas</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
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
                                            <input type="text" class="form-control" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" placeholder="yyyy-mm-dd" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4">Maksimal Penggunaan</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="maks_guna" id="maks_guna" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
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
                                            <input type="text" class="form-control" value="<?= $row->tgl_jth_tempo ?>" placeholder="yyyy-mm-dd" readonly>
                                        </div>
                                    </div>
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
                                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">Keterangan BI Untuk Fasilitas</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Sifat Piutang</label>
                                    <div class="col-md-8">
                                        <label class="radio-inline">
                                            <input type="radio" disabled>[None]
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sifat_piutang" value="1" <?php if($row->sifat_piutang == 1) echo "checked"; ?> >1 - Dengan Akad
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sifat_piutang" value="9" <?php if($row->sifat_piutang == 9) echo "checked"; ?> >9 - Tanpa Akad
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Golongan Piutang</label>
                                    <div class="col-md-8">
                                        <select class="form-control selectpicker" name="gol_piutang">
                                            <?php foreach($li_gol_piutang as $key=>$li){
                                                if($key == 19){
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Lokasi Proyek</label>
                                    <div class="col-md-8">
                                        <?php foreach($lokasi as $lok){
                                        if($lok->id == $row->lokasi_proyek){ ?>
                                            <input type="text" class="form-control" value="<?=$row->lokasi_proyek?> - <?=$lok->deskripsi?>" readonly>
                                        <?php } 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Jenis Penggunaan</label>
                                    <div class="col-md-8">
                                        <select name="jenis_guna" class="form-control selectpicker" data-live-search="true">
                                            <?php foreach($li_jns_guna as $key=>$li){
                                                if($key == 89){
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Sektor Ekonomi</label>
                                    <div class="col-md-8">
                                        <select name="sektor_ekon" class="form-control selectpicker" data-live-search="true">
                                            <?php foreach($sektor as $li){
                                                $select = '';
                                                if($li->id == $row->sektor_ekonomi) $select = 'selected';
                                                echo "<option value='".$li->id."' ".$select.">".$li->id." - ".$li->deskripsi."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Sifat Pinjaman</label>
                                    <div class="col-md-8">
                                        <select name="sifat_pinjam" class="form-control selectpicker" data-live-search="true">
                                            <?php foreach($li_jns_pinjam as $key=>$li){
                                                if($key == 60){
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tipe Penggunaan</label>
                                    <div class="col-md-8">
                                        <select name="tipe_guna" class="form-control selectpicker">
                                            <?php foreach($li_tipe_guna as $key=>$li){
                                            if($key == 3){
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Baru/Perpanjangan</label>
                                    <div class="col-md-5">
                                        <select name="status" class="form-control selectpicker">
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
                    <div class="btn-groups">
    					<a href="<?= site_url(ucfirst('maker/induk/edit_induk/')).$row->no_fos ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
    					<button type="submit" class="btn btn-primary pull-right">
    						Next <i class="glyphicon glyphicon-chevron-right"></i>
    					</button>
    				</div>
                </div>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
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
				gol_piutang: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				jenis_guna: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				sifat_pinjam: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				tipe_guna: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				status: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				sektor_ekon: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				}
			}
		});
	});
</script> -->