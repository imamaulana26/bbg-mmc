<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <?php $info = $this->session->flashdata('Info');
            if (!empty($info)) { ?>
                <br>
                <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="glyphicon glyphicon-check"></i> <?= $info ?>
                </div>
            <?php } ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table detail table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Employe</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Cabang</th>
                                <th>Email</th>
                                <th>Log On</th>
                                <th>Last Login</th>
                                <th>Akses User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list as $li) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= cetak($li->nip_user) ?></td>
                                    <td><?= cetak($li->nama_user) ?></td>
                                    <td><?= cetak($li->jabatan) ?></td>
                                    <td><?= cetak($li->cabang) ?></td>
                                    <td><?= cetak($li->email) ?></td>
                                    <td><?= cetak($li->log_on) ?></td>
                                    <td><?= cetak($li->last_login) ?></td>
                                    <td><?= cetak($li->akses_user) ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url(ucfirst('admin/user/edit_user/')) . $li->nip_user ?>">
                                            <i class="glyphicon glyphicon-edit" title="Edit"></i>
                                        </a>
                                        <!-- <a href="<?= site_url(ucfirst('admin/user/delete_user/')) . $li->id ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->