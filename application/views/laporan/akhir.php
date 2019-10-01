<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Akhir</title>
    <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="margin: 3px;">


        <p style="font-weight: bold; font-size: 10px;padding-left:110px;">Pemerintah Kota Mataram<br>TK NEGERI PEMBINA MATARAM<br>JALAN PEMUDA NO.61 MATARAM</p>
        <h6 align="center" style="">BUKU PENERIMAAN DAN PENGELUARAN BARANG</h6>
        <h6 align="center" style="">SEMESTER <?= $penyimpan['semester'] ?> TAHUN ANGGARAN <?= date('Y') ?></h6>
        <table align="center" style="width:90%; font-size: 10px;padding-left:55px;">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode Barang</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Satuan</th>
                    <th colspan="3">Jumlah Barang</th>
                    <th colspan="3">Jumlah Harga</th>
                    <th rowspan="2">Keterangan</th>
                    <!-- <th rowspan="2">Action</th> -->
                </tr>
                <tr>
                    <th scope="col">Masuk</th>
                    <th scope="col">Keluar</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Bertambah</th>
                    <th scope="col">Berkurang</th>
                    <th scope="col">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['kode_brg']; ?></td>
                        <td><?= $m['nama_brg']; ?></td>
                        <td><?= $m['satuan']; ?></td>
                        <td><?= $m['volume']; ?></td>
                        <td><?= $m['volumes']; ?></td>
                        <td><?= $sisa = $m['volumes'] - $m['volume'] ?></td>
                        <td>Rp.<?= $m['total']; ?></td>
                        <td>Rp.<?= $m['totals']; ?></td>
                        <td>Rp.<?= $tot = $m['totals'] - $m['total']; ?></td>
                        <td><?= $m['ket']; ?></td>
                        <!-- <td>
                        <a href="<?= base_url('penerimaan/kirim/') ?><?= $m['id'] ?>" class="badge badge-warning tombol-kirim">Kirim</a>
                        <a href="<?= base_url('penerimaan/edit/') ?><?= $m['id'] ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('penerimaan/hapus/') ?><?= $m['id'] ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                    </td> -->

                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
            <tbody>

                <tr>
                    <th colspan="4">Total</th>
                    <th><?= $vol ?></th>
                    <th><?= $vols ?></th>
                    <th></th>
                    <th>Rp.<?= $jumlah ?></th>
                    <th>Rp.<?= $jumlahs ?></th>
                    <th></th>
                    <th></th>

                </tr>
            </tbody>
        </table>

        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-4" style="font-size: 10px;padding-left:125px;">
                <br><br>
                <p>Atasan Langsung</p>
                <br><br><br>
                <p style="text-decoration: underline;"><?= $atasan['nama'] ?></p>
                <p style="padding-top: -20px">NIP <?= $atasan['nip'] ?></p>
            </div>
            <div class="col-sm-4" style="font-size: 10px; float: right;">
                <br>
                <p style="padding-top: 10px">Mataram, <?= $tgl ?></p>
                <p style="padding-top: -20px">Penyimpan Barang</p>
                <br><br>
                <p style="text-decoration: underline; padding-top: 10px"><?= $penyimpan['nama'] ?></p>
                <p style="padding-top: -20px">NIP <?= $penyimpan['nip'] ?></p>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>

</html>