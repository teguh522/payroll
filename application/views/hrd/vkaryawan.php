<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Data Karyawan</h1>
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
                                <input type="hidden" name="id_karyawan" value="<?php if (isset($getrow)) echo $getrow->id_karyawan ?>">
                                <div class="form-group">
                                    <label>Group</label>
                                    <select class="custom-select" name="id_group" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($group as $item) : ?>
                                            <option value="<?php echo $item->id_group ?>" <?php
                                                                                            if (isset($getrow)) {
                                                                                                echo ($getrow->id_group == $item->id_group) ? "selected" : "";
                                                                                            }
                                                                                            ?>>
                                                <?php echo $item->nama_group ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="text" name="nama_karyawan" class="form-control" value="<?php if (isset($getrow)) echo $getrow->nama_karyawan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?php if (isset($getrow)) echo $getrow->jabatan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <input type="text" name="status_karyawan" class="form-control" value="<?php if (isset($getrow)) echo $getrow->status_karyawan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Atasan Langsung</label>
                                    <select id="cariatasan" class="js-example-basic-multiple" name="atasan">
                                        <?php if (isset($getrow)) { ?>
                                            <option value=<?= $getrow->atasan_langsung ?>selected><?= $getrow->atasan_langsung ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email Karyawan</label>
                                    <select id="cariemail" class="js-example-basic-multiple" name="id_auth">
                                        <?php if (isset($getrow)) { ?>
                                            <option value=<?= $getrow->id_auth ?>selected><?= $getrow->email ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('hrd/datakaryawan') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>

                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Group</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->nama_karyawan; ?></td>
                                            <td><?php echo $val->nama_group; ?></td>
                                            <td><?php echo $val->jabatan; ?></td>
                                            <td><?php echo $val->status_karyawan; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('hrd/datakaryawan') . '?func=updatekaryawan&id=' . $val->id_karyawan ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('hrd/delete') . '?func=datakaryawan&id=' . $val->id_karyawan ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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