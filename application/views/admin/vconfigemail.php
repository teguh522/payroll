<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Configurasi SMPT Email</h1>
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
                                <label>Protocol</label>
                                <input type="hidden" name="id_config" value="<?php if (isset($data)) echo $data->id_config_email ?>">
                                <input type="text" name="protocol" value="<?php if (isset($data)) echo $data->protocol ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SMTP Host</label>
                                <input type="text" name="smtp_host" value="<?php if (isset($data)) echo $data->smtp_host ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SMTP Port</label>
                                <input type="number" name="smtp_port" value="<?php if (isset($data)) echo $data->smtp_port ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SMTP User</label>
                                <input type="text" name="smtp_user" value="<?php if (isset($data)) echo $data->smtp_user ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SMTP Password</label>
                                <input type="text" name="smtp_pass" value="<?php if (isset($data)) echo $data->smtp_pass ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SMTP Crypto</label>
                                <input type="text" name="smtp_crypto" value="<?php if (isset($data)) echo $data->smtp_crypto ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mail Type</label>
                                <input type="text" name="mailtype" value="<?php if (isset($data)) echo $data->mailtype ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SMTP Timeout</label>
                                <input type="text" name="smtp_timeout" value="<?php if (isset($data)) echo $data->smtp_timeout ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Charset</label>
                                <input type="text" name="charset" value="<?php if (isset($data)) echo $data->charset ?>" class="form-control" required>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="particles-js"></div>