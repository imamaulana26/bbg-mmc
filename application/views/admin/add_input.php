<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 1 - Form Input</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?= form_open('admin/input/simpanData') ?>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="hidden" name="kode" class="form-control" value="<?= $kode ?>">
                            
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>No Induk Pegawai</label>
                                    <input type="text" name="nip" class="form-control" value="<?= set_value('nip') ?>">
                                    <?= form_error('nip') ?>
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor CIF</label>
                                    <input type="text" name="cif" class="form-control" value="<?= set_value('cif') ?>">
                                    <?= form_error('cif') ?>
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor CIF Induk</label>
                                    <input type="text" name="cif_induk" class="form-control" value="<?= set_value('cif_induk') ?>">
                                    <?= form_error('cif_induk') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Nama Nasabah</label>
                                    <input type="text" name="nama_nsbh" class="form-control" value="<?= set_value('nama_nsbh') ?>">
                                    <?= form_error('nama_nsbh') ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Koperasi</label>
                                    <input type="text" name="nama_kop" class="form-control" value="<?= set_value('nama_kop') ?>">
                                    <?= form_error('nama_kop') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Rekening Nasabah</label>
                                    <input type="text" name="rek_nsbh" class="form-control" value="<?= set_value('rek_nsbh') ?>">
                                    <?= form_error('rek_nsbh') ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Rekening Debet Angsuran</label>
                                    <input type="text" name="rek_pokok" class="form-control" value="<?= set_value('rek_pokok') ?>">
                                    <?= form_error('rek_pokok') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Kode Cabang</label>
                                    <select name="kd_cabang" id="cabang" class="form-control">
                                        <option selected disabled>-- Pilih --</option>
                                        <?php foreach($cabang as $cab){
                                            echo "<option value='".$cab->kd_cabang."'".set_select('kd_cabang', $cab->kd_cabang).">".$cab->kd_cabang." - ".$cab->nama_cabang."</option>";
                                        } ?>
                                    </select>
                                    <?= form_error('kd_cabang') ?>
                                </div>
                                <!-- <div class="col-md-8">
                                    <label>&nbsp;</label>
                                    <div id="des_cabang"></div>
                                </div> -->
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label>Lokasi Proyek</label>
                                    <select name="lokasi" id="lokasi" class="form-control">
                                        <option selected disabled>-- Pilih --</option>
                                        <?php foreach($lokasi as $lok){
                                            echo "<option value='".$lok->id."'".set_select('lokasi', $lok->id).">".$lok->id." - ".$lok->deskripsi."</option>";
                                        } ?>
                                    </select>
                                    <?= form_error('lokasi') ?>
                                </div>
                                <!-- <div class="col-md-8">
                                    <label>&nbsp;</label>
                                    <div id="des_lokasi"></div>
                                </div> -->
                                <div class="col-md-3">
                                    <label>Tenor</label>
                                    <input type="text" name="tenor" class="form-control" value="<?= set_value('tenor') ?>">
                                    <?= form_error('tenor') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Nominal Fasilitas</label>
                                    <input type="text" name="nominal" id="nominal" class="form-control" value="<?= set_value('nominal') ?>">
                                    <?= form_error('nominal') ?>
                                </div>
                                <div class="col-md-4">
                                    <label>Nomor SP3</label>
                                    <input type="text" name="no_sp3" class="form-control" value="<?= set_value('no_sp3') ?>">
                                    <?= form_error('no_sp3') ?>
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal Angsuran</label>
                                    <select class="form-control" name="tgl_angsuran">
                                        <option selected disabled>-- Pilih --</option>
                                        <?php for($i=1; $i<=31; $i++){
                                            if($i <= 9) echo "<option value='".$i."'".set_select('tgl_angsuran', $i).">0".$i."</option>";
                                            else echo "<option value='".$i."'".set_select('tgl_angsuran', $i).">".$i."</option>";
                                        } ?>
                                    </select>
                                    <?= form_error('tgl_angsuran') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control"><?= set_value('alamat') ?></textarea>
                                    <?= form_error('alamat') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
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
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Tanggal SP3</label>
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <input type="text" name="tgl_sp3" class="form-control" placeholder="yyyy-mm-dd" value="<?= set_value('tgl_sp3') ?>">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                        </div>
                                        <?= form_error('tgl_sp3') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Jatuh Tempo</label>
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <input type="text" name="tgl_jth_tempo" class="form-control" placeholder="yyyy-mm-dd" value="<?= set_value('tgl_jth_tempo') ?>">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                        </div>
                                        <?= form_error('tgl_jth_tempo') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Frekuensi Review</label>
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <input type="text" name="frek_review" class="form-control" placeholder="yyyy-mm-dd" value="<?= set_value('frek_review') ?>">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                        </div>
                                        <?= form_error('frek_review') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Expire</label>
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <input type="text" name="tgl_expire" class="form-control" placeholder="yyyy-mm-dd" value="<?= set_value('tgl_expire') ?>">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                        </div>
                                        <?= form_error('tgl_expire') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Kode AO Pimpinan Cabang</label>
                                    <input type="text" name="kode_pim" class="form-control" value="<?= set_value('kode_pim') ?>">
                                    <?= form_error('kode_pim') ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Kode AO Risk Officer</label>
                                    <input type="text" name="kode_fao" class="form-control" value="<?= set_value('kode_fao') ?>">
                                    <?= form_error('kode_fao') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Kode AO Marketing</label>
                                    <input type="text" name="kode_ao" class="form-control" value="<?= set_value('kode_ao') ?>">
                                    <?= form_error('kode_ao') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Nomor PKS</label>
                                    <input type="text" name="no_pks" class="form-control" value="<?= set_value('no_pks') ?>">
                                    <?= form_error('no_pks') ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal PKS</label>
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <input type="text" name="tgl_pks" class="form-control" placeholder="yyyy-mm-dd" value="<?= set_value('tgl_pks') ?>">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                        </div>
                                        <?= form_error('tgl_pks')  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Gaji Setahun</label>
                                    <input type="text" name="gaji" id="gaji" class="form-control" value="<?= set_value('gaji') ?>">
                                    <?= form_error('gaji') ?>
                                </div>
                                <div class="col-md-4">
                                    <label>Omset Tahunan</label>
                                    <input type="text" id="number" class="form-control">
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
            <?= form_close() ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#cabang').on('change', function(){
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/input/listCabang') ?>",
                data: {id: id},
                success: function(data){
                    $('#des_cabang').html(data);
                }
            });
        });

        $('#lokasi').on('change', function(){
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/input/listLokasi') ?>",
                data: {id: id},
                success: function(data){
                    $('#des_lokasi').html(data);
                }
            });
        });

        /*var nominal = document.getElementById('nominal');
        nominal.addEventListener('keyup', function(evt){
            nominal.value = formatRp(this.value);
        });

        var omset = document.getElementById('number');
        var gaji = document.getElementById('gaji');
        gaji.addEventListener('keyup', function(evt){
            gaji.value = formatRp(this.value);

            var val = $(this).val().replace('.','');
            var new_val = val.split('.').join('');
            omset.value = new_val*12;
        });

        omset.addEventListener('blur', function(evt){
            omset.value = formatRp(this.value);
        });*/
    });
</script>