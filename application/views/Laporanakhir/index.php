<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-8">

            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


        </div>
        <!-- <div class="col-sm-4">
            <button class="rounded-pill float-right btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#"><span class="fas fa-fw fa-plus-circle"></span> Tambah Data</button>
        </div> -->
    </div>
    <div class="row mb-3">
        <div class="col-sm-8">
            <?= form_error('tgl_pene', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= form_error('dari', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= form_error('kode_brg', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <div class="flash-datae" data-flashdata="<?= $this->session->flashdata('messages'); ?>"></div>
        </div>
        <div class="col-sm-4">
            <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                <div class="input-group">
                    <input type="text" class="form-control bg-light small" name="search_text" onkeyup="search()" id="search_text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" disabled>
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div id="result">

        <!-- <div class="container-fluid"> -->
        <!-- <form method="post" id="import_form" enctype="multipart/form-data">
                <p><label>Select Excel File</label>
                    <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                <br />
                <input type="submit" name="import" value="Import" class="btn btn-info" />
            </form> -->
        <table class="table table-responsive table-bordered" style="width:100%">
            <thead>
                <tr class="table-primary text-nowrap" align="center">
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode Barang</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Satuan</th>
                    <th colspan="3">Jumlah Barang</th>
                    <th colspan="3">Jumlah Harga</th>
                    <th rowspan="2">Keterangan</th>
                    <!-- <th rowspan="2">Action</th> -->
                </tr>
                <tr class="table-primary">
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
        <!-- </div> -->
    </div>
    <!-- <a class="btn btn-warning" href="<?= base_url('penerimaan/kirimAll') ?>">Kirim Semua</a> -->
    <!-- <button class="btn btn-danger tombol-hapus" href="<?= base_url('penerimaan/delAll') ?>">Hapus Semua</button> -->


    <a class="btn btn-info" href="<?= base_url('laporanakhir/penlaporan') ?>" target="_blank">PDF <i class="fas fa-file-pdf text-gray-300"></i></a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penerimaan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Transaksi Penerimaan</label>
                            <input type="text" class="form-control mb-2 datepicker" data-provide="datepicker" id="tgl_pene" name="tgl_pene" placeholder="Tanggal Pembukuan" autocomplete="off">
                            <input type="text" class="form-control mb-2" id="dari" name="dari" placeholder="Nama Toko/Rekanan">
                            <input type="text" class="form-control mb-2" id="no_doc_peng" name="no_doc_peng" placeholder="No Dokumen Faktur">
                            <input type="text" class="form-control mb-2 datepicker" data-provide="datepicker" id="tgl_doc_peng" name="tgl_doc_peng" placeholder="Tanggal Dokumen Faktur" autocomplete="off">
                            <input type="text" class="form-control mb-2" id="kode_brg" name="kode_brg" placeholder="Kode Barang" onkeyup="autofill()">
                            <input type="text" class="form-control mb-2" id="nama_brg" name="nama_brg" placeholder="Nama Barang" onkeyup="hell()" autocomplete="off">
                            <input type="text" class="form-control mb-2" id="satuan" name="satuan" placeholder="Satuan">
                            <input type="text" class="form-control mb-2" id="vol" name="vol" placeholder="Volume" autocomplete="off">
                            <input type="text" class="form-control mb-2" id="harga" name="harga" placeholder="Harga Satuan" autocomplete="off">
                            <input type="text" class="form-control mb-2" id="total" name="total" placeholder="Total" readonly>
                            <input type="text" class="form-control mb-2" id="no_buk_pen" name="no_buk_pen" placeholder="No Bukti Penerimaan">
                            <input type="text" class="form-control mb-2 datepicker" data-provide="datepicker" id="tgl_buk_pen" name="tgl_buk_pen" placeholder="Tanggal Bukti Penerimaan" autocomplete="off">
                            <input type="text" class="form-control mb-2" id="ket" name="ket" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<script type="text/javascript">
    function hell() {
        $("#nama_brg").autocomplete({
            source: "<?php echo site_url('penerimaan/get_autocomplete/?'); ?>",
            select: function(event, ui) {
                $('[name="kode_brg"]').val(ui.item.kode);
                $('[name="nama_brg"]').val(ui.item.label);
                $('[name="satuan"]').val(ui.item.satuan);
            }
        });

    }



    function autofill() {
        var kode = $("#kode_brg").val();
        $.ajax({
            url: '<?= base_url() ?>penerimaan/ajax',
            data: 'kode=' + kode,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $("#nama_brg").val(obj.nama_brg);
                $("#satuan").val(obj.satuan);
            }
        });
    }

    function search() {
        var kode = $("#search_text").val();
        $.ajax({
            url: '<?= base_url() ?>laporanakhir/fetch',
            data: 'kode=' + kode,
            success: function(data) {
                $('#result').html(data);
                // var json = data,
                //     obj = JSON.parse(json);
                // $("#nama_brg").val(obj.nama_brg);
                // $("#satuan").val(obj.satuan);
            }
        });
    }

    // load_data();

    // function load_data(query) {
    //     // var search = $("search_text").val();
    //     $.ajax({
    //         url: "<?php echo base_url(); ?>penerimaan/fetch",
    //         method: "post",
    //         data: {
    //             query: query
    //         },
    //         success: function(data) {

    //             $('#result').html(data);
    //         }
    //     })
    // }

    // function search() {
    //     var search = $("#search_text").val();
    //     if (search != '') {
    //         load_data(search);
    //     } else {
    //         load_data();
    //     }
    // }




    // function autocompletes() {
    //     var nama = $("#nama_brg").val();
    //     $.ajax({
    //         url: '<?= base_url() ?>penerimaan/autoc',
    //         data: 'nama=' + nama,
    //         success: function(data) {
    //             var json = data,
    //                 data = JSON.parse(json);

    //             // $("#kode_brg").val(obj.kode_brg);
    //             // $("#satuan").val(obj.satuan);
    //         }
    //     });
    // }



    // function isi() {
    //     $("#nama_brg").autocomplete({
    //         source: "<?php echo site_url('penerimaan/get_autocomplete') ?>",

    //         select: function(event, ui) {
    //             $('[name="kode_brg"]').val(ui.item.kode_brg);
    //             $('[name="nama_brg"]').val(ui.item.nama_brg);
    //             $('[name="satuan"]').val(ui.item.satuan);

    //         }
    //     });
    // }

    // function autocompletes() {
    //     $("#nama_brg").autocomplete({
    //             var nama = $("#nama_brg").val();
    //             $.ajax({
    //                     url: '<?= base_url() ?>penerimaan/autoc',
    //                     data: 'nama=' + nama,
    //                     success: function(data) {
    //                         var json = data,
    //                             obj = JSON.parse(json);
    //                         select: function(event, ui) {
    //                             $('[name="kode_brg"]').val(ui.item.kode_brg);
    //                             $('[name="nama_brg"]').val(ui.item.nama_brg);
    //                             $('[name="satuan"]').val(ui.item.satuan);
    //                             $("#kode_brg").val(obj.kode_brg);
    //                             $("#satuan").val(obj.satuan);
    //                         }
    //                     });
    //             });
    //     }

    //     function ajax2() {
    //         var nama = $("#nama_brg").val();
    //         $.ajax({
    //             url: '<?= base_url() ?>penerimaan/autoc',
    //             data: 'nama=' + nama,
    //             success: function(data) {
    //                 var json = data,
    //                     obj = JSON.parse(json);
    //                 $("#kode_brg").val(obj.kode_brg);
    //                 $("#satuan").val(obj.satuan);
    //             }
    //         });
    //     }



    // $(document).ready(function() {
    //     load_data();

    //     function load_data() {
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>excel_import/fetch",
    //             method: "POST",
    //             success: function(data) {
    //                 $('#customer_data').html(data);
    //             }
    //         })
    //     }

    //     $('#import_form').on('submit', function(event) {
    //         event.preventDefault();
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>excel_import/import",
    //             method: "POST",
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function(data) {
    //                 $('#file').val('');
    //                 load_data();
    //                 alert(data);
    //             }
    //         })
    //     });
    // });
</script>