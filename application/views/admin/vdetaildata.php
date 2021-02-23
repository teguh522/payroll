<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Detail Pelamar</h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body">

                        <ul class="nav nav-tabs2">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-new">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-new">Pendidikan</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-new">Pengalaman Kerja</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Dokumen">Dokumen</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Str">STR/SIP</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Pelatihan">Pelatihan</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Beasiswa">Beasiswa</a></li>
                        </ul>
                        <br>
                        <div class="col-md-12 col-sm-12 text-right hidden-xs">
                            <button id="btnvalidate" data-id="<?php if (isset($id_submit)) echo $id_submit ?>" class="btn btn-sm <?php echo ($submit[0]->status == 'lulus') || ($submit[0]->status == 'tidak_lulus') ? 'btn-primary' : 'btn-danger' ?>" <?php echo $submit[0]->status == 'lulus' || $submit[0]->status == 'tidak_lulus' ? 'disabled' : '' ?>>
                                <?php echo $submit[0]->status == 'lulus' || $submit[0]->status == 'tidak_lulus' ? 'Tervalidasi' : 'Validasi Peserta' ?>
                            </button>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show vivify flipInX active" id="Home-new">
                                <table class="table">
                                    <tbody>
                                        <?php if (isset($biodata)) foreach ($biodata as $val) : ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo base_url('upload/foto/') . $val->foto ?>" width="150px">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama :</td>
                                                <td><?php echo $val->nama ?></td>
                                            </tr>
                                            <tr>
                                                <td>No KTP :</td>
                                                <td><?php echo $val->noktp ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email :</td>
                                                <?php foreach ($email as $data) : ?>
                                                    <td><?php echo $data->email ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td>No HP :</td>
                                                <td><?php echo $val->nohp ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat, Tanggal Lahir :</td>
                                                <td><?php echo $val->kota_lahir . ', ' . date('d-m-Y', strtotime($val->tgl_lahir)) ?></td>

                                            </tr>
                                            <tr>
                                                <td>Status :</td>
                                                <td><?php echo $val->status_pernikahan  ?></td>
                                            </tr <?php if (isset($disabilitas)) foreach ($disabilitas as $item) : ?>>
                                            <tr>
                                                <td>Jesnis Disabilitas :</td>
                                                <td><?php echo $item->nama_disabilitas  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alat Bantu :</td>
                                                <td><?php echo $item->alat_bantu  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Hambatan :</td>
                                                <td><?php echo $item->hambatan  ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td>Hobi :</td>
                                            <td><?php echo $val->hobi  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tinggi Badan :</td>
                                            <td><?php echo $val->tb . " CM"  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Berat Badan :</td>
                                            <td><?php echo $val->bb . " KG"  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Keluarga :</td>
                                            <td><?php echo $val->nama_kel  ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Keluarga :</td>
                                            <td><?php echo $val->no_kel  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi :</td>
                                            <td><?php echo $val->nama_prov  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kab/Kota :</td>
                                            <td><?php echo $val->nama_kota  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat :</td>
                                            <td><?php echo $val->alamat  ?></td>
                                        </tr>
                                        <?php foreach ($submit as $data) : ?>
                                            <tr>
                                                <td>Melamar Sebagai :</td>
                                                <td><span class="badge badge-primary"><?php echo $data->posisi ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Melamar :</td>
                                                <td><span class="badge badge-primary"><?php echo date('d-m-Y, H:m:s', strtotime($data->tgl_lamar)) ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href='<?php echo base_url('admin/printcv?id=') . $data->id_submit ?>' type="button" class="btn btn-success mb-2" title="Download"><span class="sr-only">Edit</span>
                                                        <i class="fa fa-download"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane vivify flipInX" id="Profile-new">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>Tingkat Pendidikan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Institusi</th>
                                            <th>Jurusan</th>
                                            <th>IPK / Nilai Akhir</th>
                                            <th>Dokumen</th>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($pendidikan)) foreach ($pendidikan as $val) : ?>
                                                <tr>
                                                    <td><?php echo $val->tingkat ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($val->tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($val->tgl_akhir)) ?></td>
                                                    <td><?php echo $val->nama_institusi ?></td>
                                                    <td><?php echo $val->jurusan ?></td>
                                                    <td><?php echo $val->nilai ?></td>
                                                    <?php $download = '<a href=' . base_url('upload/documents/') . $val->file_upload . ' data-toggle="tooltip" data-placement="top" target="_blank" type="button" class="btn btn-sm btn-default" title="Download"><i class="icon-arrow-down"></i></a>'; ?>
                                                    <td><?php echo ($val->file_upload == '') ? '-' : $download; ?></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane vivify flipInX" id="Contact-new">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>Perusahaan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jabatan</th>
                                            <th>Keterangan</th>
                                            <th>Dokumen</th>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($kerja)) foreach ($kerja as $val) : ?>
                                                <tr>
                                                    <td><?php echo $val->nama_perusahaan ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($val->tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($val->tgl_akhir)) ?></td>
                                                    <td><?php echo $val->jabatan ?></td>
                                                    <td><?php echo $val->keterangan ?></td>
                                                    <?php $download = '<a href=' . base_url('upload/documents/') . $val->file_upload . ' data-toggle="tooltip" data-placement="top" target="_blank" type="button" class="btn btn-sm btn-default" title="Download"><i class="icon-arrow-down"></i></a>'; ?>
                                                    <td><?php echo ($val->file_upload == '') ? '-' : $download; ?></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane vivify flipInX" id="Dokumen">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>Dokumen</th>
                                            <th>Masa Berlaku</th>
                                            <th>Keterangan</th>
                                            <th>Dokumen</th>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($dokumen)) foreach ($dokumen as $val) : ?>
                                                <tr>
                                                    <td><?php echo $val->nama_dokumen ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($val->tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($val->tgl_akhir)) ?></td>
                                                    <td><?php echo $val->keterangan ?></td>
                                                    <?php $download = '<a href=' . base_url('upload/documents/') . $val->file_upload . ' data-toggle="tooltip" data-placement="top" target="_blank" type="button" class="btn btn-sm btn-default" title="Download"><i class="icon-arrow-down"></i></a>'; ?>
                                                    <td><?php echo ($val->file_upload == '') ? '-' : $download; ?></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane vivify flipInX" id="Str">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>STR/SIP</th>
                                            <th>Nomor</th>
                                            <th>Masa Berlaku</th>
                                            <th>Nama Institusi</th>
                                            <th>Nama Faskes</th>
                                            <th>Dokumen</th>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($str)) foreach ($str as $val) : ?>
                                                <tr>
                                                    <td><?php echo $val->nama_str ?></td>
                                                    <td><?php echo $val->nomor ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($val->tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($val->tgl_akhir)) ?></td>
                                                    <td><?php echo $val->nama_institusi ?></td>
                                                    <td><?php echo $val->nama_faskes ?></td>
                                                    <?php $download = '<a href=' . base_url('upload/documents/') . $val->file_upload . ' data-toggle="tooltip" data-placement="top" target="_blank" type="button" class="btn btn-sm btn-default" title="Download"><i class="icon-arrow-down"></i></a>'; ?>
                                                    <td><?php echo ($val->file_upload == '') ? '-' : $download; ?></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane vivify flipInX" id="Pelatihan">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>Nama Pelatihan</th>
                                            <th>Tgl Pelatihan</th>
                                            <th>Dokumen</th>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($pelatihan)) foreach ($pelatihan as $val) : ?>
                                                <tr>
                                                    <td><?php echo $val->nama_pelatihan ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($val->tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($val->tgl_akhir)) ?></td>
                                                    <?php $download = '<a href=' . base_url('upload/documents/') . $val->file_upload . ' data-toggle="tooltip" data-placement="top" target="_blank" type="button" class="btn btn-sm btn-default" title="Download"><i class="icon-arrow-down"></i></a>'; ?>
                                                    <td><?php echo ($val->file_upload == '') ? '-' : $download; ?></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane vivify flipInX" id="Beasiswa">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>Nama Beasiswa</th>
                                            <th>Tgl Beasiswa</th>
                                            <th>Keterangan</th>
                                            <th>Dokumen</th>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($beasiswa)) foreach ($beasiswa as $val) : ?>
                                                <tr>
                                                    <td><?php echo $val->nama_beasiswa ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($val->tgl_awal)) . ' s/d ' . date('d-m-Y', strtotime($val->tgl_akhir)) ?></td>
                                                    <td><?php echo $val->keterangan ?></td>
                                                    <?php $download = '<a href=' . base_url('upload/documents/') . $val->file_upload . ' data-toggle="tooltip" data-placement="top" target="_blank" type="button" class="btn btn-sm btn-default" title="Download"><i class="icon-arrow-down"></i></a>'; ?>
                                                    <td><?php echo ($val->file_upload == '') ? '-' : $download; ?></td>
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
    </div>
</div>
<div id="particles-js"></div>