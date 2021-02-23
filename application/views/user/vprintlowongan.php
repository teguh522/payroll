<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Lowongan</title>
</head>

<body>
    <table class="table">
        <tbody>
            <?php
            $icon = base_url('upload/foto/thisable-logo.png');
            if (isset($data)) foreach ($data as $val) : ?>
                <tr>
                    <td><?= date('d-M-Y') ?></td>
                    <td><img src="<?= $icon ?>" width="100px"></td>
                </tr>
                <tr>
                    <td>
                        <h2>Posisi </h2>
                    </td>
                    <td>
                        <h2>: <?php echo $val->posisi; ?></h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Jenis Disabilitas</h3>
                    </td>
                    <td>: <?php echo $val->nama_disabilitas; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Perusahaan</h3>
                    </td>
                    <td>: <?php echo $val->nama_usaha; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Bidang Usaha</h3>
                    </td>
                    <td>: <?php echo $val->bidang_usaha; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Lokasi</h3>
                    </td>
                    <td>: <?php echo $val->lokasi_usaha; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Alamat</h3>
                    </td>
                    <td>: <?php echo $val->alamat_usaha; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>No. Telp</h3>
                    </td>
                    <td>: <?php echo $val->hp_usaha; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Email</h3>
                    </td>
                    <td>: <?php echo $val->email_usaha; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Tanggal Pembukaan</h3>
                    </td>
                    <td>: <?php echo $val->tgl_awal . " s/d " . $val->tgl_akhir; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Deskripsi</h3>
                    </td>
                    <td><?php echo $val->deskripsi; ?></td>
                </tr>
                <tr>
                    <td><?= base_url('/lowongan/printlowongan') ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<script>
    window.print()
</script>