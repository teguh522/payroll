<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Filter Data Pelamar</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>
                    <div class="body">
                        <div id="form-hidden2">
                            <form id="basic-form" method="post" autocomplete="off" enctype="multipart/form-data" action="<?php echo base_url('admin/caridata') ?>" novalidate>

                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" required class="input-sm form-control" name="tgl_awal">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" required class="input-sm form-control" name="tgl_akhir">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Lowongan Yang Di Buka</label>
                                    <select class="custom-select" name="lowongan" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($hasil as $item) : ?>
                                            <option value="<?php echo $item->id_lowongan ?>"><?php echo $item->posisi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <p id="error-multiselect"></p>
                                <div class="form-group">
                                    <label>Status Lamaran</label>
                                    <select class="custom-select" name="status" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect2">
                                        <option value="terkirim">Terkirim</option>
                                        <option value="lulus">Lulus</option>
                                        <option value="tidak_lulus">Tidak Lulus</option>
                                    </select>
                                </div>
                                <p id="error-multiselect2"></p>
                                <br>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
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