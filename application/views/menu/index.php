<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
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
        <div class="col-sm-4">
            <button class="rounded-pill float-right btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#"><span class="fas fa-fw fa-plus-circle"></span> Tambah Data</button>

        </div>
    </div>
    <!-- <div class="row mb-3">
        <div class="col-sm-8">

        </div>
        <div class="col-sm-4">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right" method="post">
                <div class="input-group">
                    <input type="text" class="form-control bg-light small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="keyword" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="submit" name="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div id="container">
        <table class="table table-striped table-bordered" id="manage">
            <thead>
                <tr class="table-primary">
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($brg as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['kode']; ?></td>
                        <td><?= $m['nama_brg']; ?></td>
                        <td><?= $m['satuan']; ?></td>
                        <td>Rp.<?= $m['harga']; ?></td>
                        <td>
                            <a href="<?= base_url('menu/edit/'); ?><?= $m['id'] ?>" class="badge badge-success tombol-edit">Edit</a>
                            <a href="<?= base_url('menu/hapus/'); ?><?= $m['id'] ?>" class="badge badge-danger tombol-hapus">Delete</a>
                        </td>

                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Manajemen Kode Barang</label>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Masukkan Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mb-2" id="kode" name="kode" placeholder="Masukkan Kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Masukkan Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mb-2" id="brg" name="brg" placeholder="Masukkan Nama Barang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Masukkan Satuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mb-2" id="satuan" name="satuan" placeholder="Masukkan Satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Masukkan Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control mb-2" id="harga" name="harga" placeholder="Masukkan Harga(angka)">
                            </div>
                        </div>




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