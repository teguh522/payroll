<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Form Lowongan</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card border-danger">
                        <div class="body text-danger">
                            <h5 class="card-title">Perhatian.!</h5>
                            <p class="card-text">- Demi keamanan lowongan yang telah terpublish tidak dapat di hapus.</p>
                            <p class="card-text">- Sistem tidak akan memunculkan lowongan yang sudah berakhir.</p>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <div id="form-hidden">
                            <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <select class="custom-select" name="id_perusahaan" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($jenis_usaha as $item) : ?>
                                            <option value="<?php echo $item->id_perusahaan ?>" <?php
                                                                                                if (isset($getrow)) {
                                                                                                    echo ($getrow->id_perusahaan == $item->id_perusahaan) ? "selected" : "";
                                                                                                }
                                                                                                ?>>
                                                <?php echo $item->nama_usaha ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Disabilitas</label>
                                    <select class="custom-select" name="id_disabilitas" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($jenis_disabilitas as $item) : ?>
                                            <option value="<?php echo $item->id_jenis_disabilitas ?>" <?php
                                                                                                        if (isset($getrow)) {
                                                                                                            echo ($getrow->id_disabilitas == $item->id_jenis_disabilitas) ? "selected" : "";
                                                                                                        }
                                                                                                        ?>>
                                                <?php echo $item->nama_disabilitas ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Posisi</label>
                                    <input type="hidden" name="id_lowongan" value="<?php if (isset($getrow)) echo $getrow->id_lowongan ?>">
                                    <input type="text" name="posisi" value="<?php if (isset($getrow)) echo $getrow->posisi ?>" <?php if (isset($getrow)) echo "readonly" ?> class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembukaan</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_awal ?>" required name="tgl_awal">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_akhir ?>" required name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea id="summernote" name="deskripsi"><?php if (isset($getrow)) echo $getrow->deskripsi ?></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('admin/postlowongan') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>
                        <p></p>
                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Posisi</th>
                                        <th>Tgl Awal</th>
                                        <th>Tgl Akhir</th>
                                        <th>Disabilitas</th>
                                        <th>Perusahaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->posisi; ?></td>
                                            <td><?php echo $val->tgl_awal; ?></td>
                                            <td><?php echo $val->tgl_akhir; ?></td>
                                            <td><?php echo $val->nama_disabilitas; ?></td>
                                            <td><?php echo $val->nama_usaha; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('admin/postlowongan') . '?func=updatelowongan&id=' . $val->id_lowongan ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span>
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('admin/delete') . '?func=lowongan&id=' . $val->id_lowongan ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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