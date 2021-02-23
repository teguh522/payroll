<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Form Riwayat</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Pelatihan</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <div id="form-hidden">
                            <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                                <div class="form-group">
                                    <input type="hidden" name="id_pelatihan" value="<?php if (isset($getrow)) echo $getrow->id_pelatihan ?>">
                                    <label>Nama Pelatihan</label>
                                    <input type="text" name="nama_pelatihan" value="<?php if (isset($getrow)) echo $getrow->nama_pelatihan ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_awal ?>" required name="tgl_awal">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_akhir ?>" required name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sertifikat Pelatihan (800 Kb)</label>
                                    <input type="file" name="file_upload" class="dropify" value="<?php if (isset($getrow)) echo $getrow->file_upload ?>" data-default-file="<?php if (isset($getrow)) echo base_url('upload/documents/' . $getrow->file_upload) ?>" data-allowed-file-extensions="pdf" data-max-file-size="800K">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('riwayat/pelatihan') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>
                        <p></p>
                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pelatihan</th>
                                        <th>Tgl Awal</th>
                                        <th>Tgl Akhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->nama_pelatihan; ?></td>
                                            <td><?php echo $val->tgl_awal; ?></td>
                                            <td><?php echo $val->tgl_akhir; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('riwayat/pelatihan') . '?func=updatepelatihan&id=' . $val->id_pelatihan ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span>
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('riwayat/delete') . '?func=pelatihan&id=' . $val->id_pelatihan ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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
</div>

</div>

</div>
<div id="particles-js"></div>