<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Data Koperasi</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<?php $info = $this->session->flashdata('Info');
			if(!empty($info)){ ?>
				<br>
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="glyphicon glyphicon-check"></i> <?= $info ?>
				</div>
			<?php } ?>
			
			<?php if($this->session->userdata('akses_user') == 'Maker'){ ?>
			<a href="<?= site_url('maker/koperasi/add_koperasi') ?>" class="btn btn-primary">Tambah Data <i class="glyphicon glyphicon-plus-sign"></i></a>
			<br><br>
			<?php } ?>
	    	<div class="panel panel-default">
	        	<div class="panel-body">
			        <table width="100%" class="table detail-kop table-striped table-bordered table-hover">
			        	<thead>
			            	<tr>
			                	<th>#</th>
			                    <th>CIF Induk</th>
			                    <th>Nama Koperasi</th>
			                	<th>Cabang</th>
			                    <th>Rekening Agent</th>
			                    <th>Nominal Tersedia</th>
			                    <th>Tenor Bank</th>
			                    <th>Rate Agent</th>
			                    <?php if($this->session->userdata('akses_user') != 'Checker'){ ?>
			                    <th>Kode Koperasi</th>
			                    <?php } ?>
			                    <?php if($this->session->userdata('akses_user') == 'Reviewer' || $this->session->userdata('akses_user') == 'Maker'){ ?>
			                    <th>Aksi</th>
			                    <?php } ?>
			                </tr>
			            </thead>
			            <tbody>
			            <?php $no = 1;
			            foreach($data->result() as $dt){ ?>
			            	<tr>
			            		<td><?= $no++ ?></td>
			            		<td><?= $dt->cif_induk ?></td>
			            		<td><?= $dt->nama_kop ?></td>
			            		<td><?= $dt->cabang ?></td>
			            		<td><?= $dt->rek_agent ?></td>
			            		<td><?= number_format($dt->nominal, 0, '.',',') ?></td>
			            		<td><?= $dt->tenor_bank ?></td>
			            		<td><?= $dt->rate_bank ?></td>
			            		<?php if($this->session->userdata('akses_user') != 'Checker'){ ?>
			            		<td><?= $dt->id_fasilitas ?></td>
			            		<?php }
			            		if($this->session->userdata('akses_user') == 'Reviewer' || $this->session->userdata('akses_user') == 'Maker'){ ?>
			            		<td class="text-center">
			            			<a href="<?= site_url('maker/koperasi/edit_koperasi/').$dt->cif_induk ?>">
	                                	<i class="glyphicon glyphicon-edit" title="Edit"></i>
	                            	</a>
	                            </td>
	                        	<?php } ?>
			            	</tr>
			            <?php } ?>   
			            </tbody>
			        </table>
		        </div>
	        </div>
	    </div>
	</div>
</div>