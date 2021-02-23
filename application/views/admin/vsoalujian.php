<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Soal Assesment</h1>
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
                        <div id="form-hidden">

                            <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                                <input type="hidden" name="id_soal" value="<?php if (isset($getrow)) echo $getrow->id_soal ?>">
                                <div class="form-group">
                                    <label>Kategori Soal</label>
                                    <select class="custom-select" name="kategori_soal" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($kategori as $item) : ?>
                                            <option value="<?php echo $item->id_kategori_soal ?>" <?php
                                                                                                    if (isset($getrow)) {
                                                                                                        echo ($getrow->id_kategori == $item->id_kategori_soal) ? "selected" : "";
                                                                                                    }
                                                                                                    ?>>
                                                <?php echo $item->posisi . '_' . $item->id_kategori_soal ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tambah Pertanyaan</label>
                                    <textarea id="summernote" name="soal"><?php if (isset($getrow)) echo $getrow->soal ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Opsi A</label>
                                    <input type="text" value="<?php if (isset($getrow)) echo $getrow->opsi_a ?>" name="opsi_a" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Opsi B</label>
                                    <input type="text" value="<?php if (isset($getrow)) echo $getrow->opsi_b ?>" name="opsi_b" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Opsi C</label>
                                    <input type="text" value="<?php if (isset($getrow)) echo $getrow->opsi_c ?>" name="opsi_c" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Opsi D</label>
                                    <input type="text" value="<?php if (isset($getrow)) echo $getrow->opsi_d ?>" name="opsi_d" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios1" <?php if (isset($getrow)) {
                                                                                                                            echo ($getrow->jawaban_benar == 'A') ? 'checked' : '';
                                                                                                                        }
                                                                                                                        ?> value="A">
                                        <label class="form-check-label" for="exampleRadios1">
                                            A
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios2" <?php if (isset($getrow)) {
                                                                                                                            echo ($getrow->jawaban_benar == 'B') ? 'checked' : '';
                                                                                                                        }
                                                                                                                        ?> value="B">
                                        <label class="form-check-label" for="exampleRadios2">
                                            B
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios3" <?php if (isset($getrow)) {
                                                                                                                            echo ($getrow->jawaban_benar == 'C') ? 'checked' : '';
                                                                                                                        }
                                                                                                                        ?> value="C">
                                        <label class="form-check-label" for="exampleRadios3">
                                            C
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios4" <?php if (isset($getrow)) {
                                                                                                                            echo ($getrow->jawaban_benar == 'D') ? 'checked' : '';
                                                                                                                        }
                                                                                                                        ?> value="D">
                                        <label class="form-check-label" for="exampleRadios5">
                                            D
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('assesment/daftarsoal') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>
                        <br><br>
                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <a href="<?= base_url('assesment/printsoal') ?>" target="_blank" class="btn btn-primary">PRINT</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Pertanyaan</th>
                                        <th>Opsi A</th>
                                        <th>Opsi B</th>
                                        <th>Opsi C</th>
                                        <th>Opsi D</th>
                                        <th>Jawaban Benar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->posisi . '_' . $val->id_kategori ?></td>
                                            <td><?php echo $val->soal; ?></td>
                                            <td><?php echo $val->opsi_a; ?></td>
                                            <td><?php echo $val->opsi_b; ?></td>
                                            <td><?php echo $val->opsi_c; ?></td>
                                            <td><?php echo $val->opsi_d; ?></td>
                                            <td><?php echo $val->jawaban_benar; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('assesment/daftarsoal') . '?func=updatedaftarsoal&id=' . $val->id_soal ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('assesment/deletedata') . '?func=daftarsoal&id=' . $val->id_soal ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
                                                    <span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="particles-js"></div>