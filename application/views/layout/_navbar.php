<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <strong class="navbar-brand">Sistem Multiposting Murabahah Channeling</strong>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?= $this->session->userdata('nama_user') ?> (<?= $this->session->userdata('akses_user') ?>) <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="<?= site_url('login/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <?php $level = $this->session->userdata('akses_user');
            if($level == 'Admin'){ ?>
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                <li><a href="<?= site_url('admin/input') ?>"><i class="fa fa-file-text fa-fw"></i> Murabahah Channeling</a></li>
                <li><a href="forms.html"><i class="fa fa-file-text fa-fw"></i> Channel Agent</a></li>
                <li><a href="#"><i class="fa fa-print fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="login.html">Login Page</a></li>
                </ul>
                <!-- /.nav-second-level -->
                </li>
            <?php } else { ?>
                <li><a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

