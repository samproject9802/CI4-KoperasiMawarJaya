<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title">Laman <?= $pages; ?></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <form action="/pegawai/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('namaLengkap') ? 'is-invalid' : ''); ?>" id="namaLengkap" name="namaLengkap" autofocus value="<?= old('namaLengkap'); ?>">
                    <div class="invalid-feedback">
                        <b><?= $validation->getError('namaLengkap'); ?></b>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamatLengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                    <textarea class="form-control <?= ($validation->hasError('alamatLengkap') ? 'is-invalid' : ''); ?>" id="alamatLengkap" rows="3" name="alamatLengkap" value="<?= old('alamatLengkap'); ?>"></textarea>
                    <div class="invalid-feedback">
                        <b><?= $validation->getError('alamatLengkap'); ?></b>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomorHP" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('nomorHP') ? 'is-invalid' : ''); ?>" id="nomorHP" name="nomorHP" value="<?= old('nomorHP'); ?>">
                    <div class="invalid-feedback">
                        <b><?= $validation->getError('nomorHP'); ?></b>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('jabatan') ? 'is-invalid' : ''); ?>" id="jabatan" name="jabatan" value="<?= old('jabatan'); ?>">
                    <div class="invalid-feedback">
                        <b><?= $validation->getError('jabatan'); ?></b>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="profilephoto" class="col-sm-2 col-form-label">Foto Profile</label>
                <div class="col-sm-2">
                    <img src="/assets/profile/profile-1.png" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                    <input type="file" class="form-control <?= ($validation->hasError('profilephoto') ? 'is-invalid' : ''); ?>" id="profilephoto" name="profilephoto" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <b><?= $validation->getError('profilephoto'); ?></b>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>