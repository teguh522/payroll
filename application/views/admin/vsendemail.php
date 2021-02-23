<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Send Email</h1>
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

                        <form id="basic-form" autocomplete="off" method="post" enctype="multipart/form-data" action="<?php if (isset($action)) echo $action ?>" novalidate>
                            <div class="form-group">
                                <label>Cari Email Penerima</label>
                                <select id="penerima-email" class="js-example-basic-multiple" name="penerima[]" multiple="multiple">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" name="pengirim" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea id="summernote" name="text_email"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="particles-js"></div>