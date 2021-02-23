<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Ketentuan</h1>
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
                        <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                            <div class="form-group">
                                <label>Kategori Soal : <?php if (isset($detail)) echo $detail->posisi . "_" . $detail->id_kategori_soal ?></label><br>
                                <label>Tanggal : <?php if (isset($detail)) echo $detail->tgl_awal_soal . " s/d " . $detail->tgl_akhir_soal ?></label><br>
                                <label>Waktu : <?php if (isset($detail)) echo $detail->waktu . " menit" ?></label><br>
                                <label>Total Soal : <?php if (isset($totalsoal)) echo $totalsoal  ?></label>
                            </div>
                            <?php if ((date('Y-m-d') < $detail->tgl_akhir_soal) && (date('Y-m-d') >= $detail->tgl_awal_soal)) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" required type="checkbox" name="cekbox" value="proses" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Saya setuju dengan syarat dan ketentuan yang berlaku
                                    </label>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Mulai</button>
                            <?php endif ?>
                            <a href="<?php echo base_url('dashboard') ?>" class="btn btn-primary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="particles-js"></div>