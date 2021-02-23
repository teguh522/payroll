<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Daftar Nilai</h1>
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

                    <div class="body">
                        <div class="table-responsive">
                            <table id="table-data" class="table table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>KTP</th>
                                        <th>Nama</th>
                                        <th>Posisi</th>
                                        <th>Tgl Pengerjaan</th>
                                        <th>Waktu</th>
                                        <th>Jumlah Soal</th>
                                        <th>Jawaban Benar</th>
                                        <th>Nilai Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($soal)) foreach ($soal as $val) : ?>
                                        <tr>
                                            <?php
                                            $soal = ($jumlahsoal != null) ? count($jumlahsoal) : '0';
                                            $jwb = ($jawaban != null) ? count($jawaban) : '0';
                                            if ($jwb == 0) {
                                                $score = 0;
                                            } else {
                                                $score = ($jwb / $soal) * 100;
                                            }
                                            ?>
                                            <td><?php echo $val->noktp ?></td>
                                            <td><?php echo $val->nama ?></td>
                                            <td><?php echo $val->posisi ?></td>
                                            <td><?php echo $val->tgl_awal_soal . " s/d " . $val->tgl_akhir_soal ?></td>
                                            <td><?php echo $val->waktu ?></td>
                                            <td><?php echo $soal ?></td>
                                            <td><?php echo $jwb ?></td>
                                            <td><?php echo  ceil($score) ?></td>
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