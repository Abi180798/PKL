<div class="container-fluid">


    <div class="row">
        <div class="col-sm-8">

            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <?= form_error('kode', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('brg', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('satuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('message', '<small class="text-danger pl-3">', '</small>'); ?>

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>

    </div>

    <div class="col-sm-8">

        <form action="<?= base_url('pengeluaran/edit'); ?>" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Edit Pengeluaran Barang</label>
                <input type="hidden" name="id" value="<?= $brg['id']; ?>"">
                <div class=" form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pembukuan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1 datepicker" data-provide="datepicker" id="tgl_pene" name="tgl_peng" placeholder="Tanggal Pembukuan" autocomplete="off" value="<?= $brg['tgl_peng']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">No Surat Permintaan Barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1" id="no_spbrg" name="no_spbrg" placeholder="No Dokumen Faktur" value="<?= $brg['no_spbrg']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Surat Permintaan Barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1 datepicker" data-provide="datepicker" id="tgl_spbrg" name="tgl_spbrg" placeholder="Tanggal Dokumen Faktur" autocomplete="off" value="<?= $brg['tgl_spbrg']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Unit Kerja</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1" id="nm_un_kerja" name="nm_un_kerja" placeholder="Nama Toko/Rekanan" value="<?= $brg['nm_un_kerja']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Sumber</label>
                <div class="col-sm-9">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect02" name="smbr">
                            <option value="<?= $brg['smbr']; ?>" selected><?= $brg['smbr']; ?></option>
                            <option value="Komite">Komite</option>
                            <option value="BOP">BOP</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                        </div>
                    </div>
                    <!-- <input type="text" class="form-control mb-1" id="sumber" name="sumber" onkeyup="helly()" placeholder="Sumber Dana" value="<?= $brg['sumber']; ?>"> -->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kode Barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1" id="kode_brg" name="kode_brg" placeholder="Kode Barang" onkeyup="autofill()" value="<?= $brg['kode_brg']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Barang</label>
                <div class="col-sm-9">
                    <input type=" text" class="form-control mb-1" id="nama_brg" name="nama_brg" placeholder="Masukkan Nama Barang" onkeyup="hell()" value="<?= $brg['nama_brg']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Satuan</label>
                <div class="col-sm-9">
                    <input type=" text" class="form-control mb-1" id="satuan" name="satuan" placeholder="Masukkan Satuan" value="<?= $brg['satuan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Volume</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1" id="vol" name="vol" placeholder="Volume" autocomplete="off" value="<?= $brg['volumes']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Harga Satuan</label>
                <div class="col-sm-9">
                    <input type=" text" class="form-control mb-1" id="harga" name="harga" placeholder="Masukkan Harga(angka)" value="<?= $brg['hargas']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jumlah Harga</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1" id="total" name="total" placeholder="Total" value="<?= $brg['totals']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Penyerahan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1 datepicker" data-provide="datepicker" id="tgl_peny" name="tgl_peny" placeholder="Tanggal Bukti Penerimaan" autocomplete="off" value="<?= $brg['tgl_peny']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status Barang</label>
                <div class="col-sm-9">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect02" name="stts">
                            <option value="<?= $brg['stts']; ?>" selected><?= $brg['stts']; ?></option>
                            <option value="Ada">Ada</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-1" id="ket" name="ket" placeholder="Keterangan" value="<?= $brg['kets']; ?>">
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>

</form>
</div>
</div>
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
</script>