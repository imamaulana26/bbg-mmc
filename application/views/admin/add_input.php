<style type="text/css">
    #formValid .feedbackContainer .form-control-feedback{
        right: 15px;
    }

    #formValid .dateContainer .form-control-feedback{
        top: 25px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Step 1 - Form Input</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <form method="post" id="formValid" action="<?= site_url('admin/input/simpanData') ?>">
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <input type="hidden" name="kode" class="form-control" value="<?= $kode ?>">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No Induk Pegawai</label>
                                        <input type="text" name="nip" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nomor CIF</label>
                                        <input type="text" name="cif" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nomor CIF Induk</label>
                                        <input type="text" name="cif_induk" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Nasabah</label>
                                        <input type="text" name="nama_nsbh" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Koperasi</label>
                                        <input type="text" name="nama_kop" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rekening Nasabah</label>
                                        <input type="text" name="rek_nsbh" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rekening Debet Angsuran</label>
                                        <input type="text" name="rek_pokok" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 feedbackContainer">
                                    <div class="form-group">
                                        <label>Kode Cabang</label>
                                        <select name="kd_cabang" id="cabang" class="form-control">
                                            <option selected disabled>-- Pilih --</option>
                                            <?php foreach($cabang as $cab){
                                                echo "<option value='".$cab->kd_cabang."'>".$cab->kd_cabang." - ".$cab->nama_cabang."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-8">
                                    <label>&nbsp;</label>
                                    <div id="des_cabang"></div>
                                </div> -->
                            </div>

                            <div class="row">
                                <div class="col-md-8 feedbackContainer">
                                    <div class="form-group">
                                        <label>Lokasi Proyek</label>
                                        <select name="lokasi" id="lokasi" class="form-control">
                                            <option selected disabled>-- Pilih --</option>
                                            <?php foreach($lokasi as $lok){
                                                echo "<option value='".$lok->id."'>".$lok->id." - ".$lok->deskripsi."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-8">
                                    <label>&nbsp;</label>
                                    <div id="des_lokasi"></div>
                                </div> -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tenor</label>
                                        <input type="text" name="tenor" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nominal Fasilitas</label>
                                        <input type="text" name="nominal" id="nominal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nomor SP3</label>
                                        <input type="text" name="no_sp3" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 feedbackContainer">
                                    <div class="form-group">
                                        <label>Tanggal Angsuran</label>
                                        <select class="form-control" name="tgl_angsuran">
                                            <option selected disabled>-- Pilih --</option>
                                            <?php for($i=1; $i<=31; $i++){
                                                if($i <= 9) echo "<option value='".$i."'>0".$i."</option>";
                                                else echo "<option value='".$i."'>".$i."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 dateContainer">
                                    <div class="form-group">
                                        <label>Tanggal Pencairan</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" name="tgl_cair" class="form-control" placeholder="yyyy-mm-dd" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 dateContainer">
                                    <div class="form-group">
                                        <label>Tanggal SP3</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" name="tgl_sp3" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 dateContainer">
                                    <div class="form-group">
                                        <label>Tanggal Jatuh Tempo</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" name="tgl_jth_tempo" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 dateContainer">
                                    <div class="form-group">
                                        <label>Frekuensi Review</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" name="frek_review" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 dateContainer">
                                    <div class="form-group">
                                        <label>Tanggal Expire</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" name="tgl_expire" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Gaji Bulanan</label>
                                        <input type="text" name="gaji" id="gaji" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Gaji Tahunan</label>
                                        <input type="text" name="gaji_thn" id="gaji_thn" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode AO Pimpinan Cabang</label>
                                        <input type="text" name="kode_pim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode AO Risk Officer</label>
                                        <input type="text" name="kode_fao" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode AO Marketing</label>
                                        <input type="text" name="kode_ao" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor PKS</label>
                                        <input type="text" name="no_pks" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 dateContainer">
                                    <div class="form-group">
                                        <label>Tanggal PKS</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" name="tgl_pks" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary" style="margin-left: 90%">
                    Next <i class="glyphicon glyphicon-chevron-right"></i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#cabang').on('change', function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= site_url('admin/input/listCabang') ?>",
            data: {id: id},
            success: function(data){
                $('#des_cabang').html(data);
            }
        });
    });

    $('#lokasi').on('change', function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= site_url('admin/input/listLokasi') ?>",
            data: {id: id},
            success: function(data){
                $('#des_lokasi').html(data);
            }
        });
    });

    var nominal = document.getElementById('nominal');
    nominal.addEventListener('keyup', function(evt){
        nominal.value = numeral(this.value).format('0,0');
    });

    var omset = document.getElementById('gaji_thn');
    var gaji = document.getElementById('gaji');
    gaji.addEventListener('keyup', function(evt){
        gaji.value = numeral(this.value).format('0,0');

        var val = $(this).val().replace(',','');
        var new_val = val.split(',').join('');
        omset.value = numeral(new_val*12).format('0,0');
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
                nip: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 10
                        }
                    }
                },
                cif: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 10
                        }
                    }
                },
                cif_induk: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 10
                        }
                    }
                },
                nama_nsbh: {
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
                            max: 65
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
                        regexp: {
                            regexp: char
                        },
                        stringLength: {
                            max: 65
                        }
                    }
                },
                rek_nsbh: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 16
                        }
                    }
                },
                rek_pokok: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 16
                        }
                    }
                },
                kd_cabang: {
                    validators: {
                        notEmpty: {
                            message: msg
                        }
                    }
                },
                lokasi: {
                    validators: {
                        notEmpty: {
                            message: msg
                        }
                    }
                },
                tgl_angsuran: {
                    validators: {
                        notEmpty: {
                            message: msg
                        }
                    }
                },
                tenor: {
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
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        stringCase: {
                            'case': 'upper'
                        },
                        stringLength: {
                            max: 35
                        }
                    }
                },
                gaji: {
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
                no_sp3: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: /^[A-Z0-9./-]+$/,
                            message: 'This field must contain ALFANUMERIC and special characters'
                        },
                        stringLength: {
                            max: 19
                        }
                    }
                },
                kode_pim: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 20
                        }
                    }
                },
                kode_ao: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 20
                        }
                    }
                },
                kode_fao: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: numb,
                            message: 'Please enter only number characters'
                        },
                        stringLength: {
                            max: 20
                        }
                    }
                },
                no_pks: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        regexp: {
                            regexp: /^[A-Z0-9./-]+$/,
                            message: 'This field must contain ALFANUMERIC and special characters'
                        },
                        stringLength: {
                            max: 30
                        }
                    }
                },
                tgl_sp3: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                },
                tgl_jth_tempo: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                },
                frek_review: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                },
                tgl_expire: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                },
                tgl_pks: {
                    validators: {
                        notEmpty: {
                            message: msg
                        },
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                }
            }
        });

        <?php $array = array('tgl_sp3','tgl_jth_tempo','frek_review','tgl_expire','tgl_pks');
        foreach($array as $val){ ?>
            $('.input-group.date').on('changeDate show', function(e){
                $('#formValid').bootstrapValidator('revalidateField', '<?= $val ?>');
            });
        <?php } ?>
    });
</script>