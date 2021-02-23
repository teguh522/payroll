<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Form Interview</h1>
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
                                    <label>Nama Pelamar</label>
                                    <select id="caripelamar" class="js-example-basic-multiple" name="id_submit" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Yang Tersimpan</label>
                                    <input type="text" value="<?php if (isset($getrow)) echo $getrow->nama . " | " . $getrow->noktp . " | " . $getrow->posisi ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Interview</label>
                                    <input data-provide="datepicker" name='tgl_interview' data-date-autoclose="true" value="<?php if (isset($getrow)) echo $getrow->tgl_interview ?>" class="form-control" data-date-format="yyyy-mm-dd" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Interviewer</label>
                                    <input type="text" name="nama_interviewer" value="<?php if (isset($getrow)) echo $getrow->nama_interviewer ?>" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('admin/interview') ?>" class="btn btn-primary">Batal</a>
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
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Posisi</th>
                                        <th>Tgl Interview</th>
                                        <th>Nama Interviewer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->nama; ?></td>
                                            <td><?php echo $val->nama_usaha; ?></td>
                                            <td><?php echo $val->posisi; ?></td>
                                            <td><?php echo $val->tgl_interview; ?></td>
                                            <td><?php echo $val->nama_interviewer; ?></td>
                                            <td>
                                                <a href='<?php echo base_url('admin/printinterview') . '?id=' . $val->id_interview ?>' target="_blank" type="button" class="btn btn-warning mb-2" title="Print"><span class="sr-only"></span>
                                                    <i class="fa fa-print"></i></a>
                                                <a href='#' type="button" data-toggle="modal" id="btnsoalinterview" data-target="#soalinterview" data-id-interview="<?= $val->id_interview ?>" class="btn btn-primary mb-2" title="Soal Interview"><span class="sr-only">Tambah Soal</span>
                                                    <i class="fa fa-book"></i></a>
                                                <a href='<?php echo base_url('admin/interview') . '?func=updateinterview&id=' . $val->id_interview ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span>
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('admin/delete') . '?func=interview&id=' . $val->id_interview ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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
<div class="modal fade" id="soalinterview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Soal Interview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="tampilid" name="id_interview">
                <div id="jawabaninterview"></div>
                <form id="form-jawaban-interview" autocomplete="off" method="post" enctype="multipart/form-data" action="#" novalidate>

                    <?php $no = 1;
                    if (isset($soal)) foreach ($soal as $val) : ?>
                        <div class="form-group">
                            <label><?= $no++ . ". " . $val->soal_interview ?></label>
                            <input type="hidden" name="id_soal_interview[]" value="<?= $val->id_soal_interview ?>">
                            <input type="text" name="jawaban_interview[]" class="form-control" required>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnsimpanjwb" class="btn btn-round btn-primary">Simpan Jawaban</button>
            </div>
        </div>
    </div>
</div>