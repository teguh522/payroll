<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Master KPI</h1>
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
                        <form id="basic-form" autocomplete="off" method="get" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <select id="carikaryawan" class="js-example-basic-multiple" name="karyawan">
                                    <?php if (isset($getrow)) { ?>
                                        <option value=<?= $getrow->atasan_langsung ?>selected><?= $getrow->atasan_langsung ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary"><?php echo (isset($getrow)) ? 'Edit' : 'Cari'; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="particles-js"></div>