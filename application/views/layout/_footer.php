    <!-- jQuery -->
    <script src="<?= base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('assets/metisMenu/metisMenu.min.js') ?>"></script>
    <!-- DataTables JavaScript -->
    <script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/datatables-plugins/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/datatables-responsive/dataTables.responsive.js') ?>"></script>
    <script src="<?= base_url('assets/datatables/js/dataTables.fixedColumns.min.js') ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets/js/sb-admin-2.js') ?>"></script>
    <!-- Bootstrap-datepicker JavaScript -->
    <script src="<?= base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- Numeral.Js -->
    <script src="<?= base_url('assets/numeral/numeral.js') ?>"></script>
    <!-- Bootstrap Validator -->
    <script src="<?= base_url('assets/bootstrapvalidator/dist/js/bootstrapValidator.js') ?>"></script>
    <!-- search select option bootstrap / bootstrap-select -->
    <script src="<?= base_url('assets/bootstrap-select/js/bootstrap-select.min.js') ?>"></script>
    <!-- bootstrap-multiselect 0.9.13 -->
    <script src="<?= base_url('assets/bootstrap-multiselect/js/bootstrap-multiselect.js') ?>"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each header cell
            $('.table.detail thead th').each(function() {
                var title = $(this).text();
                if (title != '#' && title != 'No. MMC' && title != 'No.Fas' && title != 'Aksi' && title != 'Status') {
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                }
            });

            // DataTable
            var table = $('.table.detail').DataTable({
                ordering: false,
                scrollX: true,
                <?php $akses = $this->session->userdata('akses_user');
                if ($akses == 'Checker' || $akses == 'Maker') { ?>
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 1
                    }
                <?php } elseif ($akses == 'Reviewer') { ?>
                    fixedColumns: {
                        rightColumns: 1
                    }
                <?php } elseif ($akses == 'Approval') { ?>
                    fixedColumns: {
                        leftColumns: 3
                    }
                <?php } else { ?>
                    fixedColumns: {
                        rightColumns: 1
                    }
                <?php } ?>
            });

            // Apply the search
            table.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Setup - add a text input to each header cell
            $('.table.detail-eks thead th').each(function() {
                var title = $(this).text();
                if (title != '#' && title != 'No. MMC' && title != 'No.Fas' && title != 'Aksi' && title != 'Status' && title != 'Progress' &&
                    title != 'Status Cair') {
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                }
            });

            // DataTable
            var tbl_eks = $('.table.detail-eks').DataTable({
                ordering: false,
                scrollX: true,
                <?php $akses = $this->session->userdata('akses_user');
                if ($akses == 'Checker') { ?>
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 1
                    }
                <?php } elseif ($akses == 'Reviewer') { ?>
                    fixedColumns: {
                        leftColumns: 3,
                        rightColumns: 2
                    }
                <?php } elseif ($akses == 'Approval') { ?>
                    fixedColumns: {
                        leftColumns: 3,
                        rightColumns: 1
                    }
                <?php } ?>
            });

            // Apply the search
            tbl_eks.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Setup - add a text input to each header cell
            $('.table.detail-rev thead th').each(function() {
                var title = $(this).text();
                if (title != '#' && title != 'No. MMC' && title != 'No.Fas' && title != 'Aksi' && title != 'Status') {
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                }
            });

            // DataTable
            var tbl_rev = $('.table.detail-rev').DataTable({
                ordering: false,
                scrollX: true,
                <?php $akses = $this->session->userdata('akses_user');
                if ($akses == 'Maker') { ?>
                    fixedColumns: {
                        rightColumns: 1
                    }
                <?php } else { ?>
                    fixedColumns: {
                        leftColumns: 1
                    }
                <?php } ?>
            });

            // Apply the search
            tbl_rev.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Setup - add a text input to each header cell
            $('.table.detail-kop thead th').each(function() {
                var title = $(this).text();
                if (title != '#' && title != 'No. MMC' && title != 'No.Fas' && title != 'Aksi' && title != 'Status') {
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                }
            });

            // DataTable
            var tbl_kop = $('.table.detail-kop').DataTable({
                ordering: false,
                scrollX: true,
                <?php $akses = $this->session->userdata('akses_user');
                if ($akses == 'Reviewer') { ?>
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 2
                    }
                <?php } else { ?>
                    fixedColumns: {
                        leftColumns: 2,
                        rightColumns: 1
                    }
                <?php } ?>
            });

            // Apply the search
            tbl_kop.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // Setup - add a text input to each header cell
            $('.table.detail-cair thead th').each(function() {
                var title = $(this).text();
                if (title != '#' && title != 'No. MMC' && title != 'No.Fas' && title != 'Aksi' && title != 'Status') {
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                }
            });

            // DataTable
            var tbl_cair = $('.table.detail-cair').DataTable({
                ordering: false,
                scrollX: true
            });

            // Apply the search
            tbl_cair.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });

        $(document).on('click', '.panel-heading', function(evt) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
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

    <!-- from layout/_content -->
    <script type="text/javascript">
        $('.input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            enableOnReadonly: false
        });

        function ImgPreview(userfile, idPriview) {
            var gb = userfile.files;
            for (var i = 0; i < gb.length; i++) {
                var gbPriview = gb[i];
                var imgType = /image.*/;
                var priview = document.getElementById(idPriview);
                var reader = new FileReader();
                if (gbPriview.type.match(imgType)) {
                    // jika tipe data sesuai
                    priview.file = gbPriview;
                    reader.onload = (function(elemet) {
                        return function(e) {
                            elemet.src = e.target.result;
                        };
                    })(preview);
                    // membaca data URL gambar
                    reader.readAsDataURL(gbPriview);
                } else {
                    // membaca tipe data tidak sesuai
                    alert('Tipe file tidak sesuai');
                }
            }
        }

        $(document).ready(function() {
            $('#multiple').multiselect({
                nonSelectedText: '-- Pilih --',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                maxHeight: 250,
                buttonWidth: '380px'
            });
        });
    </script>
    <!-- ./from layout/_content -->

    <?php $url = $this->uri->segment(2);
    if($url == 'user'){
    	$this->load->view('admin/js/user-valid');
    } elseif($url == 'koperasi'){
    	$this->load->view('maker/js/kop-valid');
    } elseif($url == 'input'){
    	$this->load->view('maker/js/input-valid');
    } elseif($url == 'induk'){
    	$this->load->view('maker/js/induk-valid');
    } elseif($url == 'anak'){
        $this->load->view('maker/js/anak-valid');
    } elseif($url == 'link'){
        $this->load->view('maker/js/link-valid');
    } elseif($url == 'jaminan'){
        $this->load->view('maker/js/jaminan-valid');
    } elseif($url == 'asset'){
        $this->load->view('maker/js/asset-valid');
    } elseif($url == 'kontrak') {
        $this->load->view('maker/js/kontrak-valid');
    } ?>

</body>
</html>