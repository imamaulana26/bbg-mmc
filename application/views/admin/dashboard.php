<style type="text/css">
.clickable{
    cursor: pointer;   
}

.panel-heading span {
	margin-top: -20px;
	font-size: 15px;
}
</style>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    	<?php $this->load->view('layout/_navbar') ?>
    </nav>

    <div id="page-wrapper">
    	<div class="row">
			<div class="col-lg-12">
		    	<h1 class="page-header">Table Data Sumarry</h1>
			</div>
		    <!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
		    	<div class="panel panel-default">
		        	<div class="panel-heading">
		        		<a href="<?= site_url('admin/input/add_input') ?>" class="btn btn-primary">Tambah Data <i class="glyphicon glyphicon-plus"></i></a>
		        	</div>
					<!-- /.panel-heading -->
					<?php $info = $this->session->flashdata('Info');
					if(!empty($info)){ ?>
						<div class="alert alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<i class="glyphicon glyphicon-check">&nbsp;<?= $info ?></i>
						</div>
					<?php } ?>
		            <div class="panel-body">
		            	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
		            		<thead>
								<tr>
									<th>No</th>
									<th>NIP</th>
									<th>Nama Nasabah</th>
									<th>Nama Koperasi</th>
									<th>CIF</th>
									<th>CIF Induk</th>
									<th>Rek. Nasabah</th>
									<th>Kode Cabang</th>
									<th>Lokasi Proyek</th>
									<th>Nominal Fasilitas</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php $no = 1;
									foreach($data->result() as $row){ ?>
										<td><?= $no++ ?></td>
										<td><?= $row->nip ?></td>
										<td><?= $row->nama_nsbh ?></td>
										<td><?= $row->nama_kop ?></td>
										<td><?= $row->cif ?></td>
										<td><?= $row->cif_induk ?></td>
										<td><?= $row->rek_nsbh ?></td>
										<td><?= $row->kode_cabang ?></td>
										<td><?= $row->lokasi_proyek ?></td>
										<td><?= $row->nom_fasilitas ?></td>
										<td class="text-center">
											<a href="<?= site_url('admin/input/edit_input/').$row->nip ?>"><i class="glyphicon glyphicon-edit"></i></a>
											<a href="<?= site_url('admin/input/deleteAll/').$row->nip ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
											<a href="<?= site_url('admin/input/download/').$row->nip ?>"><i class="glyphicon glyphicon-download-alt"></i></a>
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

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="glyphicon glyphicon-tasks"> Summary</i>
						</h3>
						<span class="pull-right clickable">
							<i class="glyphicon glyphicon-minus"></i>
						</span>
					</div>
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
		            		<thead>
								<tr>
									<th>No</th>
									<th>NIP</th>
									<th>Nama Nasabah</th>
									<th>Nama Koperasi</th>
									<th>CIF</th>
									<th>Rek. Nasabah</th>
									<th>Kode Cabang</th>
									<th>Lokasi Proyek</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php $no = 1;
									foreach($data->result() as $row){ ?>
										<td><?= $no++ ?></td>
										<td><?= $row->nip ?></td>
										<td><?= $row->nama_nsbh ?></td>
										<td><?= $row->nama_kop ?></td>
										<td><?= $row->cif ?></td>
										<td><?= $row->rek_nsbh ?></td>
										<td><?= $row->kode_cabang ?></td>
										<td><?= $row->lokasi_proyek ?></td>
										<td class="text-center">
											<a href="<?= site_url('admin/input/edit_input/').$row->nip ?>"><i class="glyphicon glyphicon-edit"></i></a>
											<a href="<?= site_url('admin/input/delete/').$row->nip ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
											<a href="<?= site_url('admin/input/download/').$row->nip ?>"><i class="glyphicon glyphicon-download-alt"></i></a>
										</td>
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
</div>
<!-- /#wrapper -->

<script type="text/javascript">
	$(document).on('click', '.panel-heading span.clickable', function(evt){
		var $this = $(this);
		if(!$this.hasClass('panel-collapsed')) {
			$this.parents('.panel').find('.panel-body').slideUp();
			$this.addClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
		} else {
			$this.parents('.panel').find('.panel-body').slideDown();
			$this.removeClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
	}
	});
</script>