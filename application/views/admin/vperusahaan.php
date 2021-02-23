<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Perusahaan</h1>
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

                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input type="hidden" name="id_perusahaan" value="<?php if (isset($getrow)) echo $getrow->id_perusahaan ?>">
                                    <input type="text" name="nama_usaha" value="<?php if (isset($getrow)) echo $getrow->nama_usaha ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Bidang Usaha</label>
                                    <input type="text" name="bidang_usaha" value="<?php if (isset($getrow)) echo $getrow->bidang_usaha ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi_usaha" value="<?php if (isset($getrow)) echo $getrow->lokasi_usaha ?>" class="form-control" placeholder="(Jakarta / Jawa Barat / Jawa Timur, ETC)" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name='alamat_usaha' rows="2" cols="15" required><?php if (isset($getrow)) echo $getrow->alamat_usaha ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" name="hp_usaha" value="<?php if (isset($getrow)) echo $getrow->hp_usaha ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email_usaha" value="<?php if (isset($getrow)) echo $getrow->email_usaha ?>" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('admin/perusahaan') ?>" class="btn btn-primary">Batal</a>
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
                                        <th>Perusahaan</th>
                                        <th>Bidang</th>
                                        <th>Lokasi</th>
                                        <th>Telp</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->nama_usaha; ?></td>
                                            <td><?php echo $val->bidang_usaha; ?></td>
                                            <td><?php echo $val->lokasi_usaha; ?></td>
                                            <td><?php echo $val->hp_usaha; ?></td>
                                            <td><?php echo $val->email_usaha; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('admin/perusahaan') . '?func=updateperusahaan&id=' . $val->id_perusahaan ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span>
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('admin/delete') . '?func=perusahaan&id=' . $val->id_perusahaan ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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