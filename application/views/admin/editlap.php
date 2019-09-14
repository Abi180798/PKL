<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">

        <div class="col-md-8">

            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?= form_error('atasan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('penyimpan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="flash-dataes" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="<?= base_url('admin/editlap'); ?>" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Edit Nama pada Laporan</label>
                    <input type="hidden" name="id">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Atasan Langsung</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mb-1" id="atasan" name="atasan" placeholder="Atasan Langsung" value="<?= $atasan['nama'] ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIP Atasan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mb-1" id="nipa" name="nipa" placeholder="NIP Atasan" value="<?= $atasan['nip'] ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Penyimpan Barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mb-1" id="penyimpan" name="penyimpan" placeholder="Penyimpan Barang" value="<?= $penyimpan['nama'] ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIP Penyimpan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mb-1" id="nipp" name="nipp" placeholder="Penyimpan Barang" value="<?= $penyimpan['nip'] ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Laporan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mb-1 datepicker" data-provide="datepicker" id="tgl" name="tgl" placeholder="Tanggal Laporan" value="<?= $penyimpan['tgl'] ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Semester</label>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02" name="semester">
                                    <option value="<?= $penyimpan['semester']; ?>" selected><?= $penyimpan['semester']; ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>

</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->