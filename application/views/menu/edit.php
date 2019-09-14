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

        <form action="<?= base_url('menu/edit'); ?>" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Edit Manajemen Kode Barang</label>
                <input type="hidden" name="id" value="<?= $brg['id']; ?>"">
                <input type=" text" class="form-control mb-2" id="kode" name="kode" placeholder="Masukkan Kode" value="<?= $brg['kode']; ?>">
                <input type=" text" class="form-control mb-2" id="brg" name="brg" placeholder="Masukkan Nama Barang" value="<?= $brg['nama_brg']; ?>">
                <input type=" text" class="form-control mb-2" id="satuan" name="satuan" placeholder="Masukkan Satuan" value="<?= $brg['satuan']; ?>">
                <input type=" text" class="form-control mb-2" id="harga" name="harga" placeholder="Masukkan Harga(angka)" value="<?= $brg['harga']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>
</div>
</div>