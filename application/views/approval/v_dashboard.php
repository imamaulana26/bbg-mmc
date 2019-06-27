<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-university fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $koperasi->num_rows() ?></div>
                            <div>Jumlah Koperasi</div>
                        </div>
                    </div>
                </div>
                <a href="<?= site_url(ucfirst('maker/koperasi')) ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $existing->num_rows() ?></div>
                            <div>CIF Existing</div>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $getProses->num_rows() ?></div>
                            <div>Proses Pembiayaan</div>
                        </div>
                    </div>
                </div>
                <a href="<?= site_url(ucfirst('approval/dashboard/approve')) ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

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
                                <th>No.Fas</th>
                                <th>No. MMC</th>
                                <th>Cabang</th>
                                <th>NIP Member koperasi</th>
                                <th>CIF Induk</th>
                                <th>Nama Koperasi</th>
                                <th>CIF</th>
                                <th>Nama Nasabah</th>
                                <th>Rek. Nasabah</th>
                                <th>Nominal Fasilitas</th>
                                <?php if ($this->session->userdata('akses_user') != 'Approval') { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getProses->result() as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->kode ?></td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#detail<?= $row->no_fos ?>" title="Detail"><?= $row->no_fos ?></a>
                                    </td>
                                    <td><?= $row->kode_cabang ?></td>
                                    <td><?= $row->nip_member_kop ?></td>
                                    <td><?= $row->cif_induk ?></td>
                                    <td><?= $row->nama_kop ?></td>
                                    <td><?= $row->cif ?></td>
                                    <td><?= $row->nama_nsbh ?></td>
                                    <td><?= $row->rek_nsbh ?></td>
                                    <td><?= number_format($row->nom_fasilitas, 0, '.', ',') ?></td>
                                    <?php if ($this->session->userdata('akses_user') != 'Approval') { ?>
                                        <td class="text-center">
                                            <a href="<?= site_url(ucfirst('maker/input/edit_input/')) . $row->no_fos ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    <?php } ?>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="cursor: pointer">
                    <h3 class="panel-title">
                        <i class="glyphicon glyphicon-tasks"></i>&nbsp;Detail Data Existing
                        <span class="pull-right">
                            <i class="glyphicon glyphicon-minus"></i>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table detail-eks table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No.Fas</th>
                                <th>No. MMC</th>
                                <th>Cabang</th>
                                <th>NIP Member koperasi</th>
                                <th>CIF Induk</th>
                                <th>Nama Koperasi</th>
                                <th>CIF</th>
                                <th>Nama Nasabah</th>
                                <th>Rek. Nasabah</th>
                                <th>Nominal Fasilitas</th>
                                <!-- <th>Progress</th> -->
                                <th>Status Cair</th>
                                <?php if ($this->session->userdata('akses_user') != 'Approval') { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($existing->result() as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->kode ?></td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#detail<?= $row->no_fos ?>" title="Detail"><?= $row->no_fos ?></a>
                                    </td>
                                    <td><?= $row->kode_cabang ?></td>
                                    <td><?= $row->nip_member_kop ?></td>
                                    <td><?= $row->cif_induk ?></td>
                                    <td><?= $row->nama_kop ?></td>
                                    <td><?= $row->cif ?></td>
                                    <td><?= $row->nama_nsbh ?></td>
                                    <td><?= $row->rek_nsbh ?></td>
                                    <td><?= number_format($row->nom_fasilitas, 0, '.', ',') ?></td>
                                    <!-- <td>
                                                    <?php if ($row->approve == '' || $row->approve == 'Pending') {
                                                        echo "Checker";
                                                    } elseif ($row->approve == 'Approved' && $row->tgl_cair != '0000-00-00') {
                                                        echo "Approval";
                                                    } elseif ($row->approve == 'Approved' && $row->tgl_cair == '0000-00-00' || $row->approve == 'Revisi Reviewer') {
                                                        echo "Reviewer";
                                                    } else {
                                                        echo "Maker";
                                                    } ?>
                                                </td> -->
                                    <td><?= $row->status ?></td>
                                    <?php if ($this->session->userdata('akses_user') != 'Approval') { ?>
                                        <td class="text-center">
                                            <a href="<?= site_url(ucfirst('maker/input/edit_input/')) . $row->no_fos ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    <?php } ?>
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

    <?php if ($this->session->userdata('akses_user') == 'Reviewer') { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="cursor: pointer">
                        <h3 class="panel-title">
                            <i class="glyphicon glyphicon-tasks"></i>&nbsp;Data Hasil Pencairan Gagal
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-minus"></i>
                            </span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table detail-cair table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. MMC</th>
                                    <th>Cabang</th>
                                    <th>Nama File</th>
                                    <th>NOLOAN</th>
                                    <th>Proses</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($getGagal->result() as $dt) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt->no_fos ?></td>
                                        <td><?= $dt->cabang ?></td>
                                        <td><?= $dt->file_name ?></td>
                                        <td><?= $dt->no_loan ?></td>
                                        <td><?= $dt->time_upload ?></td>
                                        <td><?= $dt->status ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<!-- /#page-wrapper -->

<?php $this->load->view('approval/v_detail'); ?>