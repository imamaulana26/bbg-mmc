<div id="page-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h1>Edit User</h1>
            <hr>
        </div>
    </div>
    <?php $info = $this->session->flashdata('Info');
    if (!empty($info)) { ?>
        <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="glyphicon glyphicon-check"></i> <?= $info ?>
        </div>
    <?php } ?>

    <div class="row">
        <?php foreach ($data->result() as $dt) { ?>
            <form method="post" class="form-horizontal" action="<?= site_url('admin/user/simpanData') ?>" enctype="multipart/form-data" id="formValid">
                <div class="col-sm-4">
                    <div class="text-center">
                        <img id="preview" class="img-thumbnail" src="<?= site_url('assets/images/' . $dt->photo) ?>" style="border-radius: 100em; width: 160px; height: 160px">
                        <input type="file" name="userfile" id="userfile" class="text-center center-block file-upload" onchange="ImgPreview(this, 'preview')">
                        <i class="text-muted">Maks. file 1MB</i>
                    </div>
                    <hr>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span class="pull-left"><b>Log On</b></span><?= $dt->log_on ?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><b>Last Log In</b></span><?= $dt->last_login ?></li>
                    </ul>
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
                                    <input type="text" name="nip_user" class="form-control" value="<?= $dt->nip_user ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Lengkap</label>
                                <div class="col-xs-5">
                                    <input type="text" name="nama" class="form-control" value="<?= $dt->nama_user ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Jabatan</label>
                                <div class="col-xs-6">
                                    <select class="form-control selectpicker" name="jabatan">
                                        <?php $select = '';
                                        if ($dt->jabatan == 'Admin') $select = 'selected'; ?>
                                        <option value="Admin" <?= $select ?>>Admin</option>
                                        <optgroup label="Business Banking">
                                            <?php $bbg = array('Area Business Banking Manager', 'Branch Manager', 'Business Banking Staff', 'Business Banking Relationship Manager', 'Jr. Business Banking Relationship Manager');
                                            foreach ($bbg as $bb) {
                                                $select = '';
                                                if ($dt->jabatan == $bb) $select = 'selected';
                                                echo "<option value='" . $bb . "' " . $select . ">" . $bb . "</option>";
                                            } ?>
                                        </optgroup>
                                        <optgroup label="Financing Operational">
                                            <?php $fog = array('AFO MANAGER', 'BFO SUPERVISOR', 'BFO STAFF', 'CV OFFICER', 'CV STAFF', 'FCLA', 'FCLA OFFICER', 'FCLA STAFF', 'FO STAFF', 'FO SUPERVISOR', 'LPDC', 'LPDC MANAGER', 'LPDC OFFICER', 'LPDC SIGN OFFICER', 'LPDC STAFF', 'LPDC SUPERVISOR');
                                            foreach ($fog as $fo) {
                                                $select = '';
                                                if ($dt->jabatan == $fo) $select = 'selected';
                                                echo "<option value='" . $fo . "' " . $select . ">" . $fo . "</option>";
                                            } ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Cabang</label>
                                <div class="col-xs-6">
                                    <select class="form-control selectpicker" name="cabang" data-live-search='true'>
                                        <?php foreach ($cabang as $cab) {
                                            $select = '';
                                            if ($cab->kd_cabang == $dt->cabang) $select = 'selected';
                                            echo "<option value='" . $cab->kd_cabang . "' " . $select . ">" . $cab->kd_cabang . " - " . $cab->nama_cabang . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <?php if ($dt->akses_user == 'Reviewer' || $dt->akses_user == 'Approval' || $dt->akses_user == 'Checker') { ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jaringan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jaringan[]" multiple id="multiple">
                                            <?php $explode = explode("::", $dt->jaringan);
                                            foreach ($explode as $exp) {
                                                foreach ($cabang as $cab) {
                                                    $select = '';
                                                    if ($cab->kd_cabang == $exp) $select = 'selected';
                                                    echo "<option value='" . $cab->kd_cabang . "' " . $select . ">" . $cab->kd_cabang . " - " . $cab->nama_cabang . "</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Akses User</label>
                                <div class="col-xs-3">
                                    <select class="form-control selectpicker" name="akses">
                                        <?php $list = array('Maker', 'Checker', 'Reviewer', 'Approval');
                                        foreach ($list as $li) {
                                            $select = '';
                                            if ($li == $dt->akses_user) $select = 'selected';
                                            echo "<option value='$li' $select>" . $li . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Email</label>
                                <div class="col-xs-5">
                                    <input type="text" name="email" class="form-control" value="<?= $dt->email ?>">
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
        <?php } ?>
    </div>
</div>