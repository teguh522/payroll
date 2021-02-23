<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Daftar Kontrak Kerja</h1>
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
                                                <a href='<?php echo base_url('profile/printkontrakkerja') . '?id=' . $val->id_kontrak_kerja ?>' type="button" target="_blank" class="btn btn-primary mb-2" title="Print"><span class="sr-only">Print</span> <i class="fa fa-print"></i></a>
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