<script type="text/javascript">
	var maks_guna = document.getElementById('maks_guna');
	maks_guna.addEventListener('keyup', function(evt){
    	maks_guna.value = numeral(this.value).format('0,0');
	});

	$(document).ready(function(){
		var msg = 'This field is required and can\'t be empty';
        var numb = /^[0-9]+$/;
        var char = /^[A-Z ]+$/;

		$('#formValid').bootstrapValidator({
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				uang: {
					validators: {
						notEmpty: {
							message: msg
						},
						stringCase: {
							'case': 'upper'
						},
						regexp: {
							regexp: char
						},
						stringLength: {
							max: 3
						}
					}
				},
				maks_guna: {
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
								var val = $field.val();
								if(val != 0){
									return true;
								} else {
									return {
										valid: false,
										message: 'This value is not valid'
									}
								}
							}
						}
					}
				},
				tgl_nota: {
					validators: {
						notEmpty: {
							message: msg
						},
						date: {
							format: 'YYYY-MM-DD'
						}
					}
				},
				segmen: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				rating_int: {
					validators: {
						notEmpty: {
							message: msg
						}
					}
				},
				nama_pasangan: {
					validators: {
						stringCase: {
							'case': 'upper'
						},
						regexp: {
							regexp: char
						},
						stringLength: {
							max: 50
						}
					}
				},
				tempat_pasangan: {
					validators: {
						stringCase: {
							'case': 'upper'
						},
						regexp: {
							regexp: char
						},
						stringLength: {
							max: 20
						}
					}
				},
				tgl_pasangan: {
					validators: {
						date: {
							format: 'YYYY-MM-DD'
						}
					}
				}
			}
		});

		$('.input-group.date').on('changeDate show', function(e){
			$('#formValid').bootstrapValidator('revalidateField', 'tgl_nota');
			$('#formValid').bootstrapValidator('revalidateField', 'tgl_pasangan');
		});
	});
</script>