<div id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php $this->load->view('layout/_navbar') ?>
</nav>

<div id="page-wrapper">
    <?php $this->load->view($konten) ?>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<footer class="panel-footer text-center">
    <p>Copyright&copy;<?= date('Y') ?> Imam Maulana Ibrahim</p>
</footer>

<script type="text/javascript">
	$('.input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        enableOnReadonly: false
    });

    function formatRp(angka, prefix){
		var numb_string = angka.replace(/[^,\d]/g,'').toString(),
		split = numb_string.split(','),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if(ribuan){
			sparator = sisa ? '.' : '';
			rupiah += sparator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. '+rupiah : '');
	}
</script>