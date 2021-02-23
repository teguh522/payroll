<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Selesai</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Assesment</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>

                    <div class="body">
                        <div id='timer'>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="card border-danger">
                                <div class="body text-danger">
                                    <h5 class="card-title">Perhatian</h5>
                                    <p>Silahkan klik tombol dibawah jika anda telah selesai mengerjakan</p>
                                </div>
                            </div>
                        </div>

                        <form id="form-selesai-tes" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action2)) echo $action2 ?>" novalidate>
                            <input type="hidden" value="<?= $this->input->get('kategori_soal') ?>" name="id_kategori">
                            <button class="btn btn-block btn-sm btn-primary">Selesai</button>
                        </form>
                    </div>
                    <br><br>
                    <a href="<?= base_url('mulaites/mulai') ?>?page=<?= $this->input->get('page') - 1 ?>&kategori_soal=<?= $this->input->get('kategori_soal'); ?>" type=" button" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div id="particles-js"></div>