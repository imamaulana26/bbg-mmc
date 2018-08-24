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
</script>