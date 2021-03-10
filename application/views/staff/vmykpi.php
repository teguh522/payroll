<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>My KPI</h1>
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
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>KPI</th>
                                        <th>Bobot Target</th>
                                        <th>Nominal Per Bobot</th>
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
                                            <td>
                                                <a href='#' type="button" data-toggle="modal" id="btnangsuran" data-target="#bayarangsuranmodal" data-id-kredit="<?= $val->id_kpi ?>" class="btn btn-primary btn-sm" title="Status Progress"><span class="sr-only"></span>
                                                    <i class="fa fa-book"></i></a>
                                                <a href='<?= base_url('staff/laporprogress') . "?idkpi=" . $val->id_kpi . "&karyawan=" . $val->id_karyawan .
                                                                "&judul=" . $val->nama_kpi
                                                            ?>' type="button" class="btn btn-success btn-sm" title="Lapor Progress"><span class="sr-only"></span>
                                                    <i class="fa fa-list"></i></a>
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
<div class="modal fade" id="bayarangsuranmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Status Approval Progress</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="tampilid" name="id_interview">
                <div id="jawabaninterview"></div>
            </div>
        </div>
    </div>
</div>