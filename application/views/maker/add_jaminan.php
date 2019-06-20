<div id="page-wrapper">
    <div class="row">
    	<div class="col-md-12">
    		<h1 class="page-header">Step 5 : Pendaftaran Nilai Jaminan</h1>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
    		<div class="panel panel-default">
    			<?php foreach($data->result() as $row){ ?>
    			<form method="post" id="formValid" action="<?= site_url('maker/jaminan/simpanData') ?>" class="form-horizontal">
    			<div class="panel-body">
    				<input type="hidden" name="nip" value="<?= $row->nip_member_kop ?>">
    				<input type="hidden" name="no_fos" value="<?= $row->no_fos ?>">

    				<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Tipe Jaminan <span class="help-text"></span></label>
                				<div class="col-md-5">
                					<select class="form-control selectpicker" name="tipe_jaminan" data-live-search="true">
                						<?php foreach($li_jaminan as $key=>$li){
                							if($key == 82){
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
                				<label class="control-label col-md-6">Deskripsi</label>
                				<div class="col-md-6">
                					<input type="text" name="deskripsi" class="form-control" value="SURAT KUASA POTONG GAJI">
                				</div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Mata Uang</label>
                				<div class="col-md-3">
                					<input type="text" name="mata_uang" class="form-control" value="<?= $row->mata_uang ?>">
                				</div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Negara</label>
                				<div class="col-md-2">
                					<input type="text" name="negara" class="form-control" value="<?= $row->mata_uang == 'IDR' ? 'ID' : '' ?>">
                				</div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Nilai Pasar <span class="help-text"></span></label>
                				<div class="col-md-4">
                					<input type="text" name="nilai_pasar" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
                				</div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Nilai Likuidasi <span class="help-text"></span></label>
                				<div class="col-md-4">
                					<input type="text" name="nilai_likuidasi" class="form-control" value="<?= number_format($row->nom_fasilitas, 0, '.', ',') ?>" readonly>
                				</div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Nilai Jual Obyek Pajak (NJOP)</label>
                				<div class="col-md-4">
                					<input type="text" name="njop" id="njop" class="form-control">
                				</div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Tanggal Taksasi <span class="help-text"></span></label>
                				<div class="col-md-4">
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_cair == '0000-00-00' ? '' : $row->tgl_cair ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                			</div>
                		</div>
                	</div>

                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label class="control-label col-md-6">Tanggal Jatuh Tempo <span class="help-text"></span></label>
                				<div class="col-md-4">
                                    <div class="datepicker-center">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" value="<?= $row->tgl_jth_tempo ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                			</div>
                		</div>
                	</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-6">Surat / Bukti Kepemilikan <span class="help-text"></span></label>
                                <div class="col-md-6">
                                    <input type="text" name="surat_bukti" class="form-control" value="SURAT KUASA POTONG GAJI">
                                </div>
                            </div>
                        </div>
                    </div>

    			</div>
    			<div class="panel-footer">
    				<div class="btn-groups">
    					<a href="<?= site_url('maker/link/edit_link/').$row->no_fos ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
    					<button type="submit" class="btn btn-primary pull-right">
    						Next <i class="glyphicon glyphicon-chevron-right"></i>
    					</button>
    				</div>
    			</div>
    			</form>
    			<?php } ?>
    		</div>
    	</div>
    </div>
</div>