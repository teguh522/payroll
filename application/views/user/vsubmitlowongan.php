<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Submit Lowongan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>lowongan/create_submit" novalidate>
                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="hidden" name="id_lowongan" value="<?php if (isset($hasil)) echo $hasil->id_lowongan ?>" readonly class="form-control" required>
                                <input type="text" name="posisi" value="<?php if (isset($hasil)) echo $hasil->posisi ?>" readonly class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" value="<?php if (isset($data)) echo $data->nama ?>" class="form-control" readonly required>
                            </div>
                            <div class="form-group">
                                <label>Pilih Pendidikan Anda</label>
                                <select class="custom-select" name="tingkat_pendidikan" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                    <?php foreach ($jenis_pendidikan as $item) : ?>
                                        <option value=<?php echo $item->id_pendidikan ?>><?php echo $item->jurusan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <br>
                            <div class="card border-danger">
                                <div class="body text-danger">
                                    <h5 class="card-title">Perhatian.!</h5>
                                    <p class="card-text">Anda hanya dapat melamar satu kali.</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo (isset($data)) ? 'Lamar' : 'Simpan'; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div id="particles-js"></div>