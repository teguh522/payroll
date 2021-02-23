<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Validasi Pelamar</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card border-danger">
                        <div class="body text-danger">
                            <h5 class="card-title">Perhatian.!</h5>
                            <p class="card-text">- Mohon cek kembali data pelamar sebelum validasi.</p>
                            <p class="card-text">- Data yang telah tervalidasi tidak bisa di ubah.</p>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <div id="form-hidden2">
                            <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/create_validasi" novalidate>
                                <?php if (isset($biodata)) foreach ($biodata as $val) : ?>
                                    <div class="form-group">
                                        <label>Pelamar</label>
                                        <input type="text" name="pelamar" value="<?php echo $val->nama ?>" readonly class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No KTP</label>
                                        <input type="text" name="ktp" value="<?php echo $val->noktp ?>" readonly class="form-control" required>
                                    </div>
                                <?php endforeach ?>
                                <?php if (isset($submit)) foreach ($submit as $val) : ?>
                                    <div class="form-group">
                                        <label>Posisi</label>
                                        <input type="hidden" name="id_submit" value="<?php echo $val->id_submit ?>">
                                        <input type="text" name="pelamar" value="<?php echo $val->posisi ?>" readonly class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tgl Melamar</label>
                                        <input type="text" name="pelamar" value="<?php echo date('d-m-Y H:m:s', strtotime($val->tgl_lamar)) ?>" readonly class="form-control" required>
                                    </div>

                                <?php endforeach ?>
                                <div class="col-lg-6 col-md-12">
                                    <label>Checkbox</label>
                                    <br />
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="status" value="lulus" required data-parsley-errors-container="#error-checkbox">
                                        <span>Lulus Administrasi</span>
                                    </label>
                                    <p id="error-checkbox"></p>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Submit'; ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="particles-js"></div>