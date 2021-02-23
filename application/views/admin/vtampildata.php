<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Hasil Pencarian</h1>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>TTL</th>
                                        <th>No Hp</th>
                                        <th>JK</th>
                                        <th>Status</th>
                                        <th>Disabilitas</th>
                                        <th>Alat Bantu</th>
                                        <th>Hambatan</th>
                                        <th>Hobi</th>
                                        <th>TB</th>
                                        <th>BB</th>
                                        <th>Nama Keluarga</th>
                                        <th>No Keluarga</th>
                                        <th>Melamar Sebagai</th>
                                        <th>Pendidikan</th>
                                        <th>Jurusan</th>
                                        <th>Lulusan</th>
                                        <th>Status File</th>
                                        <th>Status Lamaran</th>
                                        <th>Provinsi</th>
                                        <th>Kota/Kab</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($hasil)) foreach ($hasil as $val) : ?>
                                        <tr>
                                            <td><a href="<?php echo base_url('admin/detailpelamar?id=') . $val->id_submit ?>" target="_blank"><?php echo $val->nama ?></a></td>
                                            <td><?php echo $val->email ?></td>
                                            <td><?php echo $val->kota_lahir . ', ' . date('d-m-Y', strtotime($val->tgl_lahir)) ?></td>
                                            <td><?php echo $val->nohp ?></td>
                                            <td><?php echo $val->jk ?></td>
                                            <td><?php echo $val->status_pernikahan ?></td>
                                            <td><?php echo $val->nama_disabilitas ?></td>
                                            <td><?php echo $val->alat_bantu ?></td>
                                            <td><?php echo $val->hambatan ?></td>
                                            <td><?php echo $val->hobi ?></td>
                                            <td><?php echo $val->tb . " CM" ?></td>
                                            <td><?php echo $val->bb . " KG" ?></td>
                                            <td><?php echo $val->nama_kel ?></td>
                                            <td><?php echo $val->no_kel ?></td>
                                            <td><?php echo $val->posisi ?></td>
                                            <td><?php echo $val->tingkat ?></td>
                                            <td><?php echo $val->jurusan ?></td>
                                            <td><?php echo $val->nama_institusi ?></td>
                                            <td> <?php echo $val->status_file == '0' ? '-' : '<span class="badge badge-primary">Terdownload</span>'; ?></td>
                                            <td> <span class="badge badge-<?= ($val->status == 'lulus') || ($val->status == 'terkirim') ? 'success' : 'danger' ?>"><?php echo $val->status ?></span></td>
                                            <td><?php echo $val->nama_prov ?> </td>
                                            <td><?php echo $val->nama_kota ?> </td>
                                            <td><?php echo $val->alamat ?></td>
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