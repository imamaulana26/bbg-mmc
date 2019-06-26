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
                <a href="<?= site_url(ucfirst('checker/dashboard')) ?>">
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
                            <div class="huge"><?= $list_approve->num_rows() ?></div>
                            <div>Approved Pending</div>
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
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-times-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $viewReject->num_rows() ?></div>
                            <div>Revisi Pending</div>
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
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="cursor: pointer">
                    <h3 class="panel-title">
                        <i class="glyphicon glyphicon-tasks"></i>&nbsp;Detail Data Approved
                        <span class="pull-right">
                            <i class="glyphicon glyphicon-minus"></i>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table detail-app table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. MMC</th>
                                <th>CIF</th>
                                <th>Nama Nasabah</th>
                                <th>Cabang</th>
                                <th>NIP Member koperasi</th>
                                <th>CIF Induk</th>
                                <th>Nama Koperasi</th>
                                <th>Rek. Nasabah</th>
                                <th>Nominal Fasilitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($list_approve->result() as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#detail<?= $row->no_fos ?>" title="Detail"><?= $row->no_fos ?></a>
                                    </td>
                                    <td><?= $row->cif ?></td>
                                    <td><?= $row->nama_nsbh ?></td>
                                    <td><?= $row->kode_cabang ?></td>
                                    <td><?= $row->nip_member_kop ?></td>
                                    <td><?= $row->cif_induk ?></td>
                                    <td><?= $row->nama_kop ?></td>
                                    <td><?= $row->rek_nsbh ?></td>
                                    <td><?= number_format($row->nom_fasilitas, 0, '.', ',') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="cursor: pointer">
                    <h3 class="panel-title">
                        <i class="glyphicon glyphicon-tasks"></i>&nbsp;Detail Data Revisi
                        <span class="pull-right">
                            <i class="glyphicon glyphicon-minus"></i>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table detail-rev table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. MMC</th>
                                <th>CIF</th>
                                <th>Nama Nasabah</th>
                                <th>Cabang</th>
                                <th>NIP Member koperasi</th>
                                <th>CIF Induk</th>
                                <th>Nama Koperasi</th>
                                <th>Rek. Nasabah</th>
                                <th>Nominal Fasilitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($viewReject->result() as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#detail<?= $row->no_fos ?>" title="Detail"><?= $row->no_fos ?></a>
                                    </td>
                                    <td><?= $row->cif ?></td>
                                    <td><?= $row->nama_nsbh ?></td>
                                    <td><?= $row->kode_cabang ?></td>
                                    <td><?= $row->nip_member_kop ?></td>
                                    <td><?= $row->cif_induk ?></td>
                                    <td><?= $row->nama_kop ?></td>
                                    <td><?= $row->rek_nsbh ?></td>
                                    <td><?= number_format($row->nom_fasilitas, 0, '.', ',') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /#page-wrapper -->

<?php foreach ($getAll->result() as $dt) { ?>
    <div class="modal fade" id="detail<?= $dt->no_fos ?>" tabindex="-1" dialog="role" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Data Detail Pembiayaan</h4>
                </div>
                <div class="modal-body">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#step1<?= $dt->no_fos ?>" data-toggle="tab">Fasilitas Induk</a></li>
                        <li><a href="#step2<?= $dt->no_fos ?>" data-toggle="tab">Fasilitas Anak</a></li>
                        <li><a href="#step3<?= $dt->no_fos ?>" data-toggle="tab">Pendaftaran Link Jaminan</a></li>
                        <li><a href="#step4<?= $dt->no_fos ?>" data-toggle="tab">Pendaftaran Nilai Jaminan</a></li>
                        <li><a href="#step5<?= $dt->no_fos ?>" data-toggle="tab">Pendaftaran Aset Murabahah</a></li>
                        <li><a href="#step6<?= $dt->no_fos ?>" data-toggle="tab">Pendaftaran Agent</a></li>
                        <li><a href="#step7<?= $dt->no_fos ?>" data-toggle="tab">Kontrak Pembiayaan (LD)</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="step1<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <input type="hidden" name="no_fos" value="<?= $dt->no_fos ?>">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($dt->nip_user == $us->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Mata Uang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->mata_uang ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tanggal Nota</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_nota ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nominal Fasilitas</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->nom_fasilitas, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tanggal SP3</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_sp3 ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maksimal Penggunaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->nom_max_guna, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Segmentasi Kriteria</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->segmen == 13 ? $dt->segmen . " - Pembiayaan Konsumer" : "" ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tanggal Jatuh Tempo</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_jth_tempo ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rating Internal</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rating_int ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rating Eksternal</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rating_eks ?> - Tidak ada rating</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step2<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($dt->nip_user == $us->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Nasabah</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_nsbh ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Mata Uang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->mata_uang ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nominal Fasilitas</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->nom_fasilitas, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maksimal Penggunaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->nom_max_guna, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Jatuh Tempo</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_jth_tempo ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Golongan Piutang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->gol_piutang == 19 ? $dt->gol_piutang . ' - Pembiayaan Konsumer' : $dt->gol_piutang ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Lokasi Proyek</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($lokasi as $lok) {
                                                        if ($lok->id == $dt->lokasi_proyek) {
                                                            echo "<p>" . $dt->lokasi_proyek . " - " . $lok->deskripsi . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Jenis Penggunaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->jenis_guna == 89 ? $dt->jenis_guna . ' - Kredit Konsumsi Lainnya' : $dt->jenis_guna ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Sifat Pinjaman</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->sifat_pinjam == 60 ? $dt->sifat_pinjam . ' - Piutang Murabahah' : $dt->sifat_pinjam ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tipe Penggunaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tipe_guna == 3 ? $dt->tipe_guna . ' - Konsumsi' : $dt->tipe_guna ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Sektor Ekonomi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($sektor as $sek) {
                                                        if ($sek->id == $dt->sektor_ekonomi) {
                                                            echo "<p>" . $dt->sektor_ekonomi . " - " . $sek->deskripsi . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Baru/Perpanjangan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php if ($dt->status_cair == 0) {
                                                        echo "<p>" . $dt->status_cair . " - Baru</p>";
                                                    } else {
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($dt->status_cair == $i) {
                                                                echo "<p>" . $dt->status_cair . " - Perpanjangan ke-" . $i . "</p>";
                                                            }
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step3<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($dt->nip_user == $us->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Kode Jaminan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->kode_jaminan == 10 ? $dt->kode_jaminan . ' - Lainnya' : $dt->kode_jaminan ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>No. CIF Nasabah</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->cif ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nasabah</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->cif_induk ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Tgl. Jatuh Tempo</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->tgl_jth_tempo ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step4<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($dt->nip_user == $us->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Tipe Jamianan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->tipe_jaminan == 82 ? $dt->tipe_jaminan . ' - Salary Slip' : $dt->tipe_jaminan ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Kode Jaminan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->kode_jaminan == 10 ? $dt->kode_jaminan . ' - Lainnya' : $dt->kode_jaminan ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Deskripsi</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $dt->deskripsi ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Mata Uang</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->mata_uang ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Negara</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->negara == 'ID' ? $dt->negara . ' - INDONESIA' : $dt->negara ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Tanggal Taksasi</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nilai Pasar</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Rp. <?= number_format($dt->nom_fasilitas, 0, '.', ',') ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nilai Likuidasi</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Rp. <?= number_format($dt->nom_fasilitas, 0, '.', ',') ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nilai Jual Objek Pajak (NJOP)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Rp. <?= $dt->njop == '' ? '-' : number_format($dt->njop, 0, '.', ',') ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Surat / Bukti Kepemilikan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->surat_bukti ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step5<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($us->nip_user == $dt->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Asset</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_asset ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Keterangan Asset</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->ket_asset ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Mata Uang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->mata_uang ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Pemasok</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_nsbh ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rekening Pemasok</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rek_nsbh ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif_pemasok ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Harga Asset</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->harga_asset, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Uang Muka</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->uang_muka, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Jumlah Asset</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->jumlah_asset ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Total Asset</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Rp. <?= number_format($dt->total_asset, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step6<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($us->nip_user == $dt->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nama Koperasi</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->nama_kop ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Tanggal Expire</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->tgl_expired ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>CIF Induk</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->cif_induk ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Tenor Bank</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->tenor_bank ?> Bulan</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Rate Bank</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->rate_bank ?>%</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nomor PKS</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->no_pks ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nomor SKKP</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->no_skkp ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Rekening Agent</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->rek_agent ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Tgl. Keputusan Komite</label>
                                        </div>
                                        <div class="col-md-3">
                                            <p><?= $dt->tgl_komite ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="step7<?= $dt->no_fos ?>">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Maker</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php foreach ($user as $us) {
                                                        if ($us->nip_user == $dt->nip_user) {
                                                            echo "<p>" . $us->nama_user . "</p>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor CIF</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->cif ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No. Aplikasi MMC</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_fos ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl. Pencairan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_cair == '0000-00-00' ? '-' : $dt->tgl_cair ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>&nbsp;</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>&nbsp;</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>NIP Member koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nip_member_kop ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Koperasi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nama_kop ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tanggal Angsuran</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_angsuran ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Mata Uang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->mata_uang ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nilai Maksimal Pembiayaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= number_format($dt->nom_max_guna, 0, '.', ',') ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode Unit Kerja</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->kode_unit_kerja == 38 ? $dt->kode_unit_kerja . ' - BBG B2B' : $dt->kode_unit_kerja ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tipe Produk</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tipe_produk ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode AO Pimpinan Cabang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->kode_pim ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode AO Risk Officer</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->kode_fao ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode AO Marketing</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->kode_ao ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Segmentasi Produk</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php $data = '';
                                                    if ($dt->segmentasi == 'CONS') {
                                                        $data = 'Konsumer (Konsumtif)';
                                                    } elseif ($dt->segmentasi == 'INV') {
                                                        $data = 'Investasi (Produktif)';
                                                    } else {
                                                        $data = 'Modal Kerja (Produktif)';
                                                    }
                                                    echo "<p>" . $dt->segmentasi . " - " . $data . "</p>"; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tipe Angusran</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tipe_angsuran == 1 ? ($dt->tipe_angsuran) . ' - Efektif Tetap' : $dt->tipe_angsuran ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tenor</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tenor ?> Bulan</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Pengusul Pembiayaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->pengusul ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Pemutus Pembiayaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->pemutus ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rekening Agent</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rek_agent ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rekening Nasabah</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rek_nsbh ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rekening Pokok</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rek_pokok ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rekening Margin</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rek_margin ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Penanda Wakalah</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->wakalah ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tipe Margin</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tipe_margin == 1 ? $dt->tipe_margin . ' - Margin Single' : $dt->tipe_margin . ' - Margin Bertingkat' ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Margin</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->margin ?>%</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Biaya Teratribusi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->teratribusi ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode Biaya</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->kode_biaya ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nilai Biaya</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->nom_biaya ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Rekening Biaya</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->rek_biaya ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Status Piutang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->status_piutang == 20 ? $dt->status_piutang . ' - Bkn Dlm Restrukturisasi' : $dt->status_piutang ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Orientasi Penggunaan</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->orientasi == 9 ? $dt->orientasi . ' - Lainnya' : $dt->orientasi . ' - Ekspor' ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Sifat Piutang</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->sifat_piutang == 1 ? $dt->sifat_piutang . ' - Dengan Akad' : $dt->sifat_piutang . ' - Tanpa Akad' ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nomor Akad</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->no_akad ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tanggal Akad</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $dt->tgl_akad ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>