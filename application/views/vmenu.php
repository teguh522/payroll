<div id="wrapper">

    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
            </div>

            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url() ?>auth/logout" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </nav>


    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="<?php echo base_url() ?>dashboard"><span>Sistem Recruitment</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="
                 <?php if (isset($data)) {
                        echo base_url('upload/foto/' . $data->foto);
                    } else {
                        echo base_url('upload/foto/user.png');
                    }
                    ?>" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Selamat Datang,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                        <strong>
                            <?php
                            if (isset($data)) {
                                echo $data->nama;
                            } else if ($this->session->userdata('level') == 'user') {
                                echo "-";
                            } else if ($this->session->userdata('level') == 'admin') {
                                echo "Administrator";
                            } else if ($this->session->userdata('level') == 'hrd') {
                                echo "HRD";
                            } else {
                                echo "Suvervisor";
                            } ?>
                        </strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="<?php echo base_url('auth/update_password') ?>"><i class="icon-user"></i>Setting</a></li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                    <?php if ($this->session->userdata('level') == 'hrd') { ?>
                        <li><a href="<?php echo base_url() ?>hrd/datakaryawan"><i class="icon-user-following"></i><span>Data Karyawan</span></a></li>
                        <li><a href="<?php echo base_url() ?>hrd/groupkaryawan"><i class="icon-folder-alt"></i><span>Group Karyawan</span></a></li>
                        <li><a href="<?php echo base_url() ?>hrd/kpikaryawan"><i class="icon-bar-chart"></i><span>KPI Karyawan</span></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="overlay"></div>