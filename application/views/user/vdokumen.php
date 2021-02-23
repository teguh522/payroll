<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Silahkan Pilih Dokumen</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Dokumen</h2>
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
                                    <input type="hidden" name="id_dokumen" value="<?php if (isset($getrow)) echo $getrow->id_dokumen ?>">
                                    <label>Jenis</label>
                                    <select class="custom-select" name="jenis_dokumen" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($jenis_dokumen as $item) : ?>
                                            <option value="<?php echo $item->id_jenis_dokumen ?>" <?php
                                                                                                    if (isset($getrow)) {
                                                                                                        echo ($getrow->jenis_dokumen == $item->id_jenis_dokumen) ? "selected" : "";
                                                                                                    }
                                                                                                    ?>>
                                                <?php echo $item->nama_dokumen ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <p id="error-multiselect"></p>

                                <div class="form-group">
                                    <label>Tanggal Awal Dokumen</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_awal ?>" name="tgl_awal">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" class="input-sm form-control" value="<?php if (isset($getrow)) echo $getrow->tgl_akhir ?>" name="tgl_akhir">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" value="<?php if (isset($getrow)) echo $getrow->keterangan ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Upload Dokumen Pendukung (800 Kb)</label>
                                    <input type="file" name="file_upload" class="dropify" value="<?php if (isset($getrow)) echo $getrow->file_upload ?>" data-default-file="<?php if (isset($getrow)) echo base_url('upload/documents/' . $getrow->file_upload) ?>" data-allowed-file-extensions="pdf" data-max-file-size="800K">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('riwayat/dokumen') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>
                        <p></p>
                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Tgl Awal</th>
                                        <th>Tgl Akhir</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->nama_dokumen; ?></td>
                                            <td><?php echo $val->tgl_awal; ?></td>
                                            <td><?php echo $val->tgl_akhir; ?></td>
                                            <td><?php echo $val->keterangan; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('riwayat/dokumen') . '?func=updatedokumen&id=' . $val->id_dokumen ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('riwayat/delete') . '?func=dokumen&id=' . $val->id_dokumen ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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