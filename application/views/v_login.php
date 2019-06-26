<?php $this->load->view('layout/_header'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title text-center"><b>Login To BSM - MMC</b></h2>
                        <p class="text-muted text-center">(BSM Multiposting Murabahah Channeling)</p>
                    </div>
                    <div class="panel-body">
                        <?php $username = $this->session->userdata('username');
                        if($username){
                            redirect('NotFound');
                        }
                        $msg = $this->session->flashdata('msg');
                        if(isset($msg)){ ?>
                            <div class="alert alert-danger fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                                <strong><?= $msg ?></strong>
                            </div>
                        <?php } ?>
                        <form action="<?= site_url('Login/auth') ?>" method="post">
                            <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input class="form-control" placeholder="Email" name="username" type="text" required autofocus>
                                    <!-- <span class="input-group-addon">@bsm.co.id</span> -->
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-success btn-block">Login</button><br>
                                <p class="text-muted text-center">Copyright &copy; 2018 BBG - PT. Bank Syariah Mandiri</p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<p><marquee>Info lebih lanjut harap hubungi : ex.3641 - Imam BBG atau <a href="mailto:ggunawan@bsm.co.id">ggunawan@bsm.co.id</a></marquee></p>
    </div>

    <?php $this->load->view('layout/_footer'); ?>