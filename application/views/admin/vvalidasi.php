<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Validasi Data Pelamar</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <div class="card border-danger">
                        <div class="body text-danger">
                            <h5 class="card-title">Perhatian.!</h5>
                            <p class="card-text">- Validasi bisa menggunakan scan qrcode pelamar.</p>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <div id="form-hidden2">
                            <form id="basic-form" method="get" autocomplete="off" enctype="multipart/form-data" action="<?php echo base_url('admin/cari_validasi') ?>" novalidate>
                                <div class="form-group">
                                    <label>No Registrasi Peserta</label>
                                    <input type="text" name="noreg" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

</div>

</div>
<div id="particles-js"></div>