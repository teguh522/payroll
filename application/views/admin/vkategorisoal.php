<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Kategori Soal</h1>
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
                                <input type="hidden" name="id_kategori" value="<?php if (isset($getrow)) echo $getrow->id_kategori_soal ?>">
                                <div class="form-group">
                                    <label>Lowongan Tersedia</label>
                                    <select class="custom-select" name="kategori_soal" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($kategori as $item) : ?>
                                            <option value="<?php echo $item->id_lowongan ?>" <?php
                                                                                                if (isset($getrow)) {
                                                                                                    echo ($getrow->id_kategori_soal == $item->id_lowongan) ? "selected" : "";
                                                                                                }
                                                                                                ?>>
                                                <?php echo $item->posisi ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Waktu Pengerjaan (menit)</label>
                                    <input type="text" name="waktu" class="form-control" value="<?php if (isset($getrow)) echo $getrow->waktu ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pengerjaan</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_awal_soal ?>" required name="tgl_awal">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_akhir_soal ?>" required name="tgl_akhir">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('assesment') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>

                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Soal</th>
                                        <th>Waktu Soal</th>
                                        <th>Tanggal Pengerjaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->posisi; ?></td>
                                            <td><?php echo $val->waktu . " menit"; ?></td>
                                            <td><?php echo $val->tgl_awal_soal . " s/d " . $val->tgl_akhir_soal; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('assesment') . '?func=updatekategori&id=' . $val->id_kategori_soal ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('assesment/deletedata') . '?func=kategorisoal&id=' . $val->id_kategori_soal ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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