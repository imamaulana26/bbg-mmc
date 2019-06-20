<div id="page-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h1>Registrasi User</h1>
            <hr>
        </div>
    </div>
    <?php $info = $this->session->flashdata('Info');
    $error = $this->session->flashdata('Error');
    if (!empty($info)) { ?>
        <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="glyphicon glyphicon-check"></i> <?= $info ?>
        </div>
    <?php } ?>
    <?php if (!empty($error)) { ?>
        <div class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="glyphicon glyphicon-exclamation-sign"></i> <?= $error ?>
        </div>
    <?php } ?>

    <div class="row">
        <form method="post" class="form-horizontal" action="<?= site_url('admin/user/simpanBaru') ?>" enctype="multipart/form-data" id="formValid">
            <div class="col-sm-4">
                <div class="text-center">
                    <img id="preview" class="img-thumbnail" style="border-radius: 100em; width: 160px; height: 160px">
                    <input type="file" name="userfile" id="userfile" class="text-center center-block file-upload" onchange="ImgPreview(this, 'preview')">
                    <i class="text-muted">Maks. file 1MB</i>
                </div>
                <hr>
            </div>

            <div class="col-sm-8">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home"><br>
                        <div class="form-group">
                            <label class="control-label col-xs-3">No. Induk Pegawai</label>
                            <div class="col-xs-3">
                                <input type="text" name="nip_user" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Lengkap</label>
                            <div class="col-xs-5">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Jabatan</label>
                            <div class="col-xs-6">
                                <select class="form-control selectpicker" name="jabatan">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Admin">Admin</option>
                                    <optgroup label="Business Banking">
                                        <?php $bbg = array('Area Business Banking Manager', 'Branch Manager', 'Business Banking Staff', 'Business Banking Relationship Manager', 'Jr. Business Banking Relationship Manager');
                                        foreach ($bbg as $bb) {
                                            echo "<option value='" . $bb . "'>" . $bb . "</option>";
                                        } ?>
                                    </optgroup>
                                    <optgroup label="Financing Operational">
                                        <?php $fog = array('AFO MANAGER', 'BFO SUPERVISOR', 'BFO STAFF', 'CV OFFICER', 'CV STAFF', 'FCLA', 'FCLA OFFICER', 'FCLA STAFF', 'FO STAFF', 'FO SUPERVISOR', 'LPDC', 'LPDC MANAGER', 'LPDC OFFICER', 'LPDC SIGN OFFICER', 'LPDC STAFF', 'LPDC SUPERVISOR');
                                        foreach ($fog as $fo) {
                                            echo "<option value='" . $fo . "'>" . $fo . "</option>";
                                        } ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Cabang</label>
                            <div class="col-xs-6">
                                <select class="form-control selectpicker" name="cabang" data-live-search='true'>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <?php foreach ($cabang as $cab) {
                                        echo "<option value='" . $cab->kd_cabang . "'>" . $cab->kd_cabang . " - " . $cab->nama_cabang . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jaringan</label>
                            <div class="col-md-6">
                                <select class="form-control" name="jaringan[]" multiple id="multiple">
                                    <?php foreach ($cabang as $cab) {
                                        echo "<option value='" . $cab->kd_cabang . "'>" . $cab->kd_cabang . " - " . $cab->nama_cabang . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Akses User</label>
                            <div class="col-xs-3">
                                <select class="form-control selectpicker" name="akses">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <?php $list = array('Admin', 'Maker', 'Checker', 'Reviewer', 'Approval');
                                    foreach ($list as $li) {
                                        echo "<option value='" . $li . "'>" . $li . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Email</label>
                            <div class="col-xs-5">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">&nbsp;</label>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>