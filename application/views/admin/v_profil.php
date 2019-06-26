<div id="page-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h1>User Profile</h1>
            <hr>
        </div>
    </div>
    <?php foreach ($data->result() as $dt) {
        $info = $this->session->flashdata('Info');
        if (!empty($info)) { ?>
            <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="glyphicon glyphicon-check"></i> <?= $info ?>
            </div>
        <?php } ?>

        <div class="row">
            <?php if ($this->session->userdata('akses_user') == 'Admin') { ?>
                <form method="post" class="form-horizontal" action="<?= site_url(ucfirst('admin/user/simpanData')) ?>" enctype="multipart/form-data">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img id="preview" class="img-thumbnail" src="<?= site_url(ucfirst('assets/images/' . $dt->photo)) ?>" style="border-radius: 100em; width: 160px; height: 160px">
                            <input type="file" name="userfile" id="userfile" class="text-center center-block file-upload" onchange="ImgPreview(this, 'preview')">
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
                                        <input type="text" name="jabatan" class="form-control" value="<?= $dt->jabatan ?>" readonly>
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


                                <div class="form-group">
                                    <label class="control-label col-xs-3">Akses User</label>
                                    <div class="col-xs-2">
                                        <select class="form-control selectpicker" name="akses">
                                            <?php if ($this->session->userdata('akses_user') == 'Admin') {
                                                echo "<option value='Admin' select>Admin</option>";
                                            } else {
                                                $list = array('Maker', 'Checker', 'Reviewer', 'Approval');
                                                foreach ($list as $li) {
                                                    $select = '';
                                                    if ($li == $dt->akses_user) $select = 'selected';
                                                    echo "<option value='$li' $select>" . $li . "</option>";
                                                }
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
            <?php } else { ?>
                <form class="form-horizontal">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img id="preview" class="img-thumbnail" src="<?= site_url(ucfirst('assets/images/' . $dt->photo)) ?>" style="border-radius: 100em; width: 160px; height: 160px">
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
                            <div class="tab-pane active" id="home">
                                <br>
                                <!-- <form accept="#" method="post" class="form-horizontal"> -->
                                <div class="form-group">
                                    <label class="control-label col-xs-3">No. Induk Pegawai</label>
                                    <div class="col-xs-3">
                                        <p class="control-label"><?= $dt->nip_user ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama Lengkap</label>
                                    <div class="col-xs-5">
                                        <p class="control-label"><?= $dt->nama_user ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama Cabang</label>
                                    <div class="col-xs-6">
                                        <?php foreach ($cabang as $cab) {
                                            if (trim($cab->kd_cabang) == $dt->cabang) { ?>
                                                <p class="control-label"><?= trim($cab->kd_cabang) ?> - <?= $cab->nama_cabang ?></p>
                                            <?php }
                                    } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Jabatan</label>
                                    <div class="col-xs-6">
                                        <p class="control-label"><?= $dt->jabatan ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Akses User</label>
                                    <div class="col-xs-2">
                                        <p class="control-label"><?= $dt->akses_user ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Email</label>
                                    <div class="col-xs-5">
                                        <p class="control-label"><?= $dt->email ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    <?php } ?>
</div>