<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Assesment</title>
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
                        <h3>Soal</h3>
                    </td>
                    <td><?php echo $val->soal; ?></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>A). <?php echo $val->opsi_a; ?></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>B). <?php echo $val->opsi_b; ?></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>C). <?php echo $val->opsi_c; ?></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>D). <?php echo $val->opsi_d; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3>Jawaban Benar</h3>
                    </td>
                    <td><?php echo $val->jawaban_benar; ?></td>
                </tr>
                <tr>
                    <td><?= base_url('/assesment/printsoal') ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<script>
    window.print()
</script>