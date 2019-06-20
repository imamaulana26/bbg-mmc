<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Pendaftaran Koperasi</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<i class="text-danger">*) Saya <b><?= $this->session->userdata('nama_user') ?></b>, dengan ini menyatakan sebenar-benarnya bahwa apa yang saya input pada Aplikasi ini sesuai dengan dokumen yang ada dan dapat dipertanggung jawabkan.</i>
			<div class="panel panel-default">
				<?php foreach($data->result() as $dt){ ?>
				<form class="form-horizontal" method="post" id="formValid" action="<?= site_url('maker/koperasi/update') ?>">
					<div class="panel-body">
						<?php if($this->session->userdata('akses_user') == 'Reviewer'){ ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">Kode Koperasi</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="id_fasilitas" value="<?= $dt->id_fasilitas ?>">
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">CIF Induk</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="cif_induk" value="<?= $dt->cif_induk ?>" readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">NPWP</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="npwp" value="<?= $dt->npwp ?>">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Nama Koperasi</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="nama_kop" value="<?= $dt->nama_kop ?>">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">Rekening Agent</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="rek_agent" value="<?= $dt->rek_agent ?>">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-6">Mata Uang</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="mata_uang" value="IDR" readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Nominal Tersedia</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nominal" id="nominal" value="<?= number_format($dt->nominal, 0, '.', ',') ?>">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-6">Tenor Bank <a href="#" class="btn-add-1">+</a></label>
									<div class="col-md-6 multiple-form-group-1">
									<?php $exp = explode("::", $dt->tenor_bank);
									$jmlh = count($exp);
									if($exp[0]){ ?>
										<div style="margin-bottom: 10px">
											<input type="text" name="tenor_bank[]" class="form-control" value="<?= $exp[0] ?>">
										</div>
									<?php }
									for($i=1; $i<$jmlh; $i++){ ?>
										<div class="input-group" style="margin-bottom: 10px">
											<input type="text" name="tenor_bank[]" value="<?= $exp[$i] ?>" class="form-control">
											<div class="input-group-addon btn btn-remove btn-danger">-</div>
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-6">Rate Bank <a href="#" class="btn-add-2">+</a></label>
									<div class="col-md-6 multiple-form-group-2">
									<?php $exp = explode("::", $dt->rate_bank);
									$jmlh = count($exp);
									if($exp[0]){ ?>
										<div style="margin-bottom: 10px">
											<input type="text" name="rate_bank[]" class="form-control" value="<?= $exp[0] ?>">
										</div>
									<?php }
									for($i=1; $i<$jmlh; $i++){ ?>
										<div class="input-group" style="margin-bottom: 10px">
											<input type="text" name="rate_bank[]" class="form-control" value="<?= $exp[$i] ?>">
											<div class="input-group-addon btn btn-remove btn-danger">-</div>
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="panel-footer">
						<div class="btn-groups">
							<a href="<?= site_url('maker/koperasi') ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
							<button type="submit" class="btn btn-primary pull-right">
								Simpan <i class="glyphicon glyphicon-check"></i>
							</button>
						</div>
					</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		var nominal = document.getElementById('nominal');
	    nominal.addEventListener('keyup', function(evt){
	        nominal.value = numeral(this.value).format('0,0');
	    });

		var msg = 'This field is required and can\'t be empty';
        var numb = /^[0-9]+$/;
        var char = /^[A-Z ]+$/;

        var max = 10;
		var wrapper1 = $('.multiple-form-group-1');
		var wrapper2 = $('.multiple-form-group-2');
		var add_field1 = $('.btn-add-1');
		var add_field2 = $('.btn-add-2');

		var text1 = "<div class='input-group' style='margin-bottom: 10px'><input type='text' name='tenor_bank[]' class='form-control'><div class='input-group-addon btn btn-danger btn-remove'>-</div></div>";

		var text2 = "<div class='input-group' style='margin-bottom: 10px'><input type='text' name='rate_bank[]' class='form-control'><div class='input-group-addon btn btn-remove btn-danger'>-</div></div>";


		$(add_field1).click(function(evt){
			evt.preventDefault();
			if($('#formValid').find(':visible[name="tenor_bank[]"]').length < max){
				$(wrapper1).append(text1);
			} else{
				alert('You Reached the limits');
			}
		});

		$(add_field2).click(function(evt){
			evt.preventDefault();
			if($('#formValid').find(':visible[name="rate_bank[]"]').length < max){
				$(wrapper2).append(text2);
			} else{
				alert('You Reached the limits');
			}
		});

		$('body').on('click', '.btn-remove', function(evt){
			$(this).parents('.input-group').remove();
		});

		$('#formValid').bootstrapValidator({
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				id_fasilitas: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						stringLength: {
							max: 35
						},
						regexp: {
							regexp: /^[LNGP0-9]+$/
						}
					}
				},
				nama_kop: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						stringLength: {
							max: 35
						},
						regexp: {
							regexp: char
						}
					}
				},
				'tenor_bank[]': {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 3
                        },
                        callback: {
                            callback: function(value, validator, $field){
                                var val = $field.val()
                                if(val >= 12 && val != 0){
                                    return true;
                                } else{
                                    return {
                                        valid: false,
                                        message: 'This value is not valid, value must be greater than 12'
                                    }
                                }
                            }
                        }
                    }
                },
				'rate_bank[]': {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: /^[0-9.]+$/
						},
						stringLength: {
							max: 5
						},
						callback: {
                            callback: function(value, validator, $field){
                                var val = $field.val()
                                if(val != 0){
                                    return true;
                                } else{
                                    return {
                                        valid: false,
                                        message: 'This value is not valid'
                                    }
                                }
                            }
                        }
					}
				},
				rek_agent: {
					validators: {
						notEmpty: {
							message: msg
						},
						regexp: {
							regexp: numb
						},
						stringLength: {
							max: 10
						}
					}
				},
				nominal: {
                    validators: {
                        regexp: {
                            regexp: /^[0-9,]+$/,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 19
                        },
                        callback: {
                            callback: function(value, validator, $field){
                                var val = $field.val()
                                if(val != 0){
                                    return true;
                                } else{
                                    return {
                                        valid: false,
                                        message: 'This value is not valid'
                                    }
                                }
                            }
                        }
                    }
                },
                npwp: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            min: 15,
                            max: 15
                        },
                        callback: {
                            callback: function(value, validator, $field){
                                var val = $field.val()
                                if(val != 0){
                                    return true;
                                } else{
                                    return {
                                        valid: false,
                                        message: 'This value is not valid'
                                    }
                                }
                            }
                        }
                    }
                }
			}
		});
	});
</script> -->