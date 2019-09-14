<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-sm-8">

            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">

            <form action="<?= base_url('user/ganti'); ?>" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password Lama</label>
                    <input type="password" class="form-control" id="currentPass" name="currentPass">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password Baru</label>
                    <input type="password" class="form-control" id="newPass1" name="newPass1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Ulangi Password Baru</label>
                    <input type="password" class="form-control" id="newPass2" name="newPass2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>

    </div>

</div>
</div>