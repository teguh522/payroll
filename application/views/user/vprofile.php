<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Form Biodata</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Data Utama</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php echo $action ?>" novalidate>
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id_user" value="<?php if (isset($data)) echo $data->id_data ?>">
                                <input type="text" name="noktp" value="<?php if (isset($data)) echo $data->noktp ?>" <?php if (isset($data)) echo "readonly"; ?> class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" value="<?php if (isset($data)) echo $data->nama ?>" class="form-control" <?php if (isset($data)) echo "readonly"; ?> required>
                            </div>
                            <div class="form-group">
                                <label>Kota Lahir</label>
                                <input type="text" name="kota_lahir" value="<?php if (isset($data)) echo $data->kota_lahir ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input data-provide="datepicker" value="<?php if (isset($data)) echo $data->tgl_lahir ?>" name='tgl_lahir' data-date-autoclose="true" class="form-control" data-date-format="yyyy-mm-dd" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label>Jenis Kelamin</label>
                                <br />
                                <label class="fancy-radio">
                                    <input type="radio" name="jk" value="pria" <?php if (isset($data)) {
                                                                                    echo ($data->jk == 'pria') ? 'checked' : '';
                                                                                }
                                                                                ?> required data-parsley-errors-container="#error-radio">
                                    <span><i></i>Pria</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="jk" value="wanita" <?php if (isset($data)) {
                                                                                        echo ($data->jk == 'wanita') ? 'checked' : '';
                                                                                    } ?>>
                                    <span><i></i>Wanita</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label>Status Nikah</label>
                                <br />
                                <label class="fancy-radio">
                                    <input type="radio" name="status" value="Belum Menikah" <?php if (isset($data)) {
                                                                                                echo ($data->status_pernikahan == 'Belum Menikah') ? 'checked' : '';
                                                                                            } ?> required data-parsley-errors-container="#error-status">
                                    <span><i></i>Belum Menikah</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="status" value="Menikah" <?php if (isset($data)) {
                                                                                            echo ($data->status_pernikahan == 'Menikah') ? 'checked' : '';
                                                                                        } ?>>
                                    <span><i></i>Menikah</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="status" value="janda" <?php if (isset($data)) {
                                                                                        echo ($data->status_pernikahan == 'janda') ? 'checked' : '';
                                                                                    } ?>>
                                    <span><i></i>Janda</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="status" value="duda" <?php if (isset($data)) {
                                                                                        echo ($data->status_pernikahan == 'duda') ? 'checked' : '';
                                                                                    } ?>>
                                    <span><i></i>Duda</span>
                                </label>
                                <p id="error-status"></p>
                            </div>
                            <div class="form-group">
                                <label>Pilih Provinsi</label>
                                <select id="getprovinsi" name="getprovinsi" required class="js-example-basic-multiple">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Kab/Kota</label>
                                <select id="getkota" name="getkota" required class="js-example-basic-multiple">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Provinsi Tersimpan</label>
                                <input type="text" value="<?php if (isset($data)) echo $data->nama_prov ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kab/Kota Tersimpan</label>
                                <input type="text" value="<?php if (isset($data)) echo $data->nama_kota ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea class="form-control" name='alamat' rows="2" cols="15" required><?php if (isset($data)) echo $data->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="nohp" value="<?php if (isset($data)) echo $data->nohp ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Disabilitas</label>
                                <select class="custom-select" name="id_disabilitas" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                    <?php foreach ($jenis_disabilitas as $item) : ?>
                                        <option value="<?php echo $item->id_jenis_disabilitas ?>" <?php
                                                                                                    if (isset($data)) {
                                                                                                        echo ($data->id_disabilitas == $item->id_jenis_disabilitas) ? "selected" : "";
                                                                                                    }
                                                                                                    ?>>
                                            <?php echo $item->nama_disabilitas ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Detail Tambahan</label>
                                <textarea class="form-control" name='hambatan' rows="2" cols="15" placeholder="Ceritakan hambatanmu dengan singkat"><?php if (isset($data)) echo $data->hambatan ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Alat Bantu</label>
                                <input type="text" name="alat_bantu" value="<?php if (isset($data)) echo $data->alat_bantu ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hobi</label>
                                <input type="text" name="hobi" value="<?php if (isset($data)) echo $data->hobi ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tinggi Badan</label>
                                <input type="number" name="tb" value="<?php if (isset($data)) echo $data->tb ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Berat Badan</label>
                                <input type="number" name="bb" value="<?php if (isset($data)) echo $data->bb ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Penanggung Jawab / Keluarga</label>
                                <input type="text" name="nama_kel" value="<?php if (isset($data)) echo $data->nama_kel ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No Penanggung Jawab / Keluarga</label>
                                <input type="number" name="no_kel" value="<?php if (isset($data)) echo $data->no_kel ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto (300 Kb)</label>
                                <input type="file" name="foto" class="dropify" value="<?php if (isset($data)) echo $data->foto ?>" data-default-file="<?php if (isset($data)) echo base_url('upload/foto/' . $data->foto) ?>" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="300K">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><?php echo (isset($data)) ? 'Edit' : 'Simpan'; ?></button>
                            <a href="<?= base_url('/profile/downloadcv') ?>" target="_blank" class="btn btn-success">Download</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

</div>
<div id="particles-js"></div>