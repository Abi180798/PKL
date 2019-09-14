<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Pengeluaran</title>
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


        <p style="font-weight: bold; font-size: 10px;">Pemerintah Kota Mataram<br>TK NEGERI PEMBINA MATARAM<br>JALAN PEMUDA NO.61 MATARAM</p>
        <h6 align="center" style="">BUKU PENGELUARAN BARANG PERSEDIAAN</h6>

        <table align="center" style="width:100%; font-size: 10px;">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Tanggal</th>
                    <th colspan="2">Dokumen Pengadaan</th>
                    <th rowspan="2">Nama Unit Kerja</th>
                    <th rowspan="2">Kode Barang</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Satuan</th>
                    <th rowspan="2">Volume</th>
                    <th rowspan="2">Harga Satuan</th>
                    <th rowspan="2">Jumlah Harga</th>
                    <th rowspan="2">Tanggal Penyerahan</th>
                    <th rowspan="2">Keterangan</th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach ($data as $m) : ?>
                <?php $i++; ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $m['tgl_peng']; ?></td>
                    <td><?= $m['no_spbrg']; ?></td>
                    <td><?= $m['tgl_spbrg']; ?></td>
                    <td><?= $m['nm_un_kerja']; ?></td>
                    <td><?= $m['kode_brg']; ?></td>
                    <td><?= $m['nama_brg']; ?></td>
                    <td><?= $m['satuan']; ?></td>
                    <td><?= $m['volumes']; ?></td>
                    <td>Rp.<?= $m['hargas']; ?></td>
                    <td>Rp.<?= $m['totals']; ?></td>
                    <td><?= $m['tgl_peny']; ?></td>
                    <td><?= $m['kets']; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="10">Total</td>
                    <td colspan="3">Rp.<?= $jumlah ?></td>
                </tr>
            </tbody>
        </table>
        <div class="row" style="padding-top: 20px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-4" style="font-size: 10px;">
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