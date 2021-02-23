<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Filter Nilai Pelamar</h1>
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
                            <form id="basic-form" method="post" autocomplete="off" enctype="multipart/form-data" action="<?php echo (isset($action)) ? $action : '' ?>" novalidate>
                                <div class="form-group">
                                    <label>Kategori Soal</label>
                                    <select class="custom-select" name="id_kategori" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                        <?php foreach ($hasil as $item) : ?>
                                            <option value="<?php echo $item->id_kategori_soal ?>"><?php echo $item->posisi . "_" . $item->id_kategori_soal ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <p id="error-multiselect"></p>
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