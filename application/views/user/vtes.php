<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Silahkan Jawab Pertanyaan</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Di Bawah ini</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <?php echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('msg') . '</div>'; ?>
                    <?php endif; ?>

                    <div class="body">
                        <div id='timer'>
                        </div>
                        <form id="frmSoal" autocomplete="off" method="post" enctype="multipart/form-data" novalidate>
                            <?php $no = 1;
                            if (isset($soal)) :
                                foreach ($soal as $val) : ?>
                                    <div class="card border-success">
                                        <div class="body ">
                                            <p><?= $this->input->get('page') + 1 . ". " . $val->soal ?></p>
                                            <p>a. <?= $val->opsi_a ?></p>
                                            <p>b. <?= $val->opsi_b ?></p>
                                            <p>c. <?= $val->opsi_c ?></p>
                                            <p>d. <?= $val->opsi_d ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id_soal" id="idsoal" value="<?= $val->id_soal ?>">
                                        <input type="hidden" name="id_jawaban" id="idjwb" value="<?= isset($getrow) ? $getrow->id_jawaban : '' ?>">
                                        <input type="hidden" name="id_kategori" id="idkategori" value="<?= $this->input->get('kategori_soal'); ?>">
                                        <label>Jawaban</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" required name="jawaban" id="jawabanuser" <?php if (isset($getrow)) {
                                                                                                                                        echo ($getrow->jawaban_user == 'A') ? 'checked' : '';
                                                                                                                                    }
                                                                                                                                    ?> value="A">
                                            <label class="form-check-label" for="exampleRadios1">
                                                A
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" required name="jawaban" id="jawabanuser" <?php if (isset($getrow)) {
                                                                                                                                        echo ($getrow->jawaban_user == 'B') ? 'checked' : '';
                                                                                                                                    }
                                                                                                                                    ?> value="B">
                                            <label class="form-check-label" for="exampleRadios2">
                                                B
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" required name="jawaban" id="jawabanuser" <?php if (isset($getrow)) {
                                                                                                                                        echo ($getrow->jawaban_user == 'C') ? 'checked' : '';
                                                                                                                                    }
                                                                                                                                    ?> value="C">
                                            <label class="form-check-label" for="exampleRadios3">
                                                C
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" required name="jawaban" id="jawabanuser" <?php if (isset($getrow)) {
                                                                                                                                        echo ($getrow->jawaban_user == 'D') ? 'checked' : '';
                                                                                                                                    }
                                                                                                                                    ?> value="D">
                                            <label class="form-check-label" for="exampleRadios5">
                                                D
                                            </label>
                                        </div>
                                    </div>
                                    <?php if ($this->input->get('page') != 0) : ?>
                                        <a href="<?= base_url('mulaites/mulai') ?>?page=<?= $this->input->get('page') - 1 ?>&kategori_soal=<?= $this->input->get('kategori_soal'); ?>" type=" button" class="btn btn-primary btn-sm">Back</a>
                                    <?php endif ?>
                                    <a href="<?= base_url('mulaites/mulai') ?>?page=<?= $this->input->get('page') + 1 ?>&kategori_soal=<?= $this->input->get('kategori_soal'); ?>" type="button" id="<?= $btn ?>" class="btn btn-primary btn-sm pull-right">Next</a>
                            <?php endforeach;
                            endif; ?>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="particles-js"></div>
<script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
</script>