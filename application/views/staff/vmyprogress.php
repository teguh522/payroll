<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Tambah Progress</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <form id="form-jawaban-interview" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                            <div class="form-group">
                                <h4>
                                    <?php echo $this->input->get('judul'); ?>
                                </h4>
                            </div>
                            <div class="form-group">
                                <input type="text" id="jumlah_angsuran" placeholder="Judul" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="jumlah_angsuran" placeholder="Deskripsi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Upload File</label>
                                <input type="file" name="foto" class="dropify" value="<?php if (isset($getrow)) echo $getrow->foto ?>" data-default-file="<?php if (isset($getrow)) echo base_url('upload/foto/' . $getrow->foto) ?>" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="200M">
                            </div>
                        </form>
                        <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                        <a href="<?php echo base_url('staff/mykpi') ?>" class="btn btn-primary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="particles-js"></div>