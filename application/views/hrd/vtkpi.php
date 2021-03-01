<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Data KPI Karyawan</h1>
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
                                <input type="hidden" name="id_karyawan" value="<?php if (isset($id_karyawan)) echo $id_karyawan ?>">
                                <input type="hidden" name="id_kpi" value="<?php if (isset($getrow)) echo $getrow->id_kpi ?>">
                                <div class="form-group">
                                    <label>Nama Target KPI</label>
                                    <input type="text" name="nama_kpi" class="form-control" value="<?php if (isset($getrow)) echo $getrow->nama_kpi ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Bobot Target</label>
                                    <input type="text" name="bobot_target" class="form-control" value="<?php if (isset($getrow)) echo $getrow->bobot_target ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nominal Per Bobot</label>
                                    <input type="text" name="nominal" class="form-control" value="<?php if (isset($getrow)) echo $getrow->nominal ?>" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Simpan'; ?></button>
                                <a href="<?php echo base_url('hrd/kpikaryawan') ?>" class="btn btn-primary">Batal</a>
                            </form>
                        </div>
                        <a href="#" id="btntambah" class="btn btn-primary pull-right">Tambah</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>KPI</th>
                                        <th>Bobot Target</th>
                                        <th>Nominal Per Bobot</th>
                                        <th>Nominal 100%</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td class="w60"><?php echo $no++; ?></td>
                                            <td><?php echo $val->nama_kpi; ?></td>
                                            <td><?php echo $val->bobot_target; ?></td>
                                            <td><?php echo number_format($val->nominal); ?></td>
                                            <td><?php echo number_format($val->nominal * $val->bobot_target); ?></td>
                                            <td>
                                                <a href='<?php echo base_url('hrd/carikpi') . '?func=updatekpi&id=' . $val->id_kpi . '&karyawan=' . $val->id_karyawan ?>' type="button" class="btn btn-success mb-2" title="Edit"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url('hrd/delete') . '?func=deletekpi&id=' . $val->id_kpi . '&karyawan=' . $val->id_karyawan ?>" onclick="return confirm('Yakin hapus data ini ?')" type="button" class="btn btn-danger mb-2" title="Delete">
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