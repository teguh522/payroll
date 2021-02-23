<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Form Kontrak Kerja</h1>
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
                                <input type="hidden" name="id_kontrak_kerja" value="<?= isset($getrow) ? $getrow->id_kontrak_kerja : "" ?>">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select" name="status_kontrak" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <option value="aktif" <?php
                                                                if (isset($getrow)) {
                                                                    echo ($getrow->status_kontrak == "aktif" ? "selected" : "");
                                                                }
                                                                ?>>Aktif</option>
                                        <option value="tidak_aktif" <?php
                                                                    if (isset($getrow)) {
                                                                        echo ($getrow->status_kontrak == "tidak_aktif" ? "selected" : "");
                                                                    }
                                                                    ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pelamar</label>
                                    <select id="caripelamar" class="js-example-basic-multiple" name="id_submit" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tersimpan</label>
                                    <input type="text" value="<?php if (isset($getrow)) echo $getrow->nama . " | " . $getrow->noktp . " | " . $getrow->posisi ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kontrak</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_awal_kontrak ?>" required name="tgl_awal">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_akhir_kontrak ?>" required name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pembuat</label>
                                    <input type="text" name="nama_pembuat" value="<?php if (isset($getrow)) echo $getrow->nama_pembuat ?>" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('admin/kontrakkerja') ?>" class="btn btn-primary">Batal</a>
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
                                        <th>Status Kontrak</th>
                                        <th>Pelamar</th>
                                        <th>Disabilitas</th>
                                        <th>Perusahaan</th>
                                        <th>Posisi</th>
                                        <th>Tgl Kontrak</th>
                                        <th>Nama Pembuat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><span class="badge badge-<?= ($val->status_kontrak == 'aktif') ? 'success' : 'danger' ?>"><?php echo $val->status_kontrak ?></span></td>
                                            <td><?php echo $val->nama; ?></td>
                                            <td><?php echo $val->nama_disabilitas; ?></td>
                                            <td><?php echo $val->nama_usaha; ?></td>
                                            <td><?php echo $val->posisi; ?></td>
                                            <td><?php echo $val->tgl_awal_kontrak . " s/d " . $val->tgl_akhir_kontrak; ?></td>
                                            <td><?php echo $val->nama_pembuat; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('admin/printkontrakkerja') . '?id=' . $val->id_kontrak_kerja ?>' target="_blank" type="button" class="btn btn-primary mb-2" title="Print"><span class="sr-only">Print</span> <i class="fa fa-print"></i></a>
                                                <a href='<?php echo base_url('admin/kontrakkerja') . '?func=updatekontrak&id=' . $val->id_kontrak_kerja ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('admin/delete') . '?func=kontrakkerja&id=' . $val->id_kontrak_kerja ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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