    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Lowongan</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Yang Tersedia</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="body">
                    <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?= base_url('/lowongan/cari_loker') ?>" novalidate>
                        <div class="form-group">
                            <label>Cari Lowongan</label>
                            <input type="text" name="cari_lowongan" placeholder="IT, Admin, Keuangan dll" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Cari</button>
                    </form>
                </div>
            </div>
            <div class="row clearfix">

                <?php if (isset($hasil)) : ?>
                    <?php foreach ($hasil as $val) : ?>
                        <div class="col-lg-6 col-md-6">

                            <div class="card">
                                <div class="body">
                                    <h4 class="card-title text-center"><?php echo $val->posisi ?></h4>
                                    <h5 class="card-subtitle text-center"><?php echo $val->nama_usaha . " ({$val->lokasi_usaha})" ?></h5>
                                    <h6 class="card-title text-center"><?php echo $val->nama_disabilitas ?></h6>
                                    <br>
                                    <div class="card-subtitle "><?php echo date("d-m-Y", strtotime($val->tgl_awal)) . ' s/d ' . date("d-m-Y", strtotime($val->tgl_akhir)) ?></div>
                                    <p class="card-text"><?php echo $val->deskripsi ?></p>
                                    <a href="<?php echo base_url('lowongan/submit?id=') . $val->id_lowongan ?>" class="btn btn-block btn-primary">Apply Lowongan</a>
                                    <a href="<?php echo base_url('lowongan/printlowongan?id=') . $val->id_lowongan ?>" target="_blank" class="btn btn-block btn-success">Print</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else : ?>
                    <h4>Lowongan Tidak Tersedia</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>

    </div>
    <div id="particles-js"></div>