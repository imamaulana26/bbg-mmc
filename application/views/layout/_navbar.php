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
            <li><a href="<?= site_url('admin/user/profil') ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
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
            <?php $akses = $this->session->userdata('akses_user');
            if($akses == 'Admin'){ ?>
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-cogs fa-fw"></i> Setting Users<sapn class="fa arrow"></sapn></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= site_url('admin/user') ?>"><i class="fa fa-users fa-fw"></i> Input Users</a></li>
                    </ul>
                </li>
                <li><a href="<?= site_url('admin/user/log') ?>"><i class="fa fa-history fa-fw"></i> Daftar Log History</a></li>
            <?php } else if($akses == 'Maker'){ ?>
                <li><a href="<?= site_url('maker/dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-tasks fa-fw"></i> Data Pembiayaan<sapn class="fa arrow"></sapn></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= site_url('maker/koperasi') ?>"><i class="fa fa-file-text fa-fw"></i> Data Koperasi</a></li>
                        <li><a href="<?= site_url('maker/input') ?>"><i class="fa fa-file-text fa-fw"></i> Input Data Pembiayaan</a></li>
                    </ul>
                </li>
            <?php } else{
                if($this->session->userdata('akses_user') == 'Checker'){
                    echo "<li><a href='".site_url('checker/dashboard')."'><i class='fa fa-dashboard fa-fw'></i> Dashboard</a></li>";
                } else{
                    echo "<li><a href='".site_url('approval/dashboard')."'><i class='fa fa-dashboard fa-fw'></i> Dashboard</a></li>";
                } ?>
                <li><a href="<?= site_url('maker/koperasi') ?>"><i class="fa fa-university fa-fw"></i> Daftar Koperasi</a></li> 
            <?php } ?>
			<li><a href="<?= site_url('Pto') ?>" ><i class="glyphicon glyphicon-exclamation-sign"></i> Petunjuk Penggunaan</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->