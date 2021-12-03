<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title p-0 m-0">Laman <?= $pages; ?></h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="card-title p-0 m-0">Data Usaha</h3>
                    </div>
                    <div class="card-body">
                        <form action="/anggota/save" method="POST">
                            <?php csrf_field(); ?>
                            <div class="mb-3 row">
                                <label for="namaPemohon" class="col-sm-4 col-form-label">Nama Pemohon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('namaPemohon') ? 'is-invalid' : ''); ?>" id="namaPemohon" name="namaPemohon" value="<?= old('namaPemohon'); ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('namaPemohon'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaPasangan" class="col-sm-4 col-form-label">Nama Pasangan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('namaPasangan') ? 'is-invalid' : ''); ?>" id="namaPasangan" name="namaPasangan" value="<?= old('namaPasangan'); ?>">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('namaPasangan'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaUsaha" class="col-sm-4 col-form-label">Nama Usaha</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('namaUsaha') ? 'is-invalid' : ''); ?>" id="namaUsaha" name="namaUsaha" value="<?= old('namaUsaha'); ?>">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('namaUsaha'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamatUsaha" class="col-sm-4 col-form-label">Alamat Usaha</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control <?= ($validation->hasError('alamatUsaha') ? 'is-invalid' : ''); ?>" id="alamatUsaha" name="alamatUsaha" rows="3"><?= old('alamatUsaha'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('alamatUsaha'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="statusBangunan" class="col-sm-4 col-form-label">Status Bangunan</label>
                                <div class="col-sm-8">
                                    <select class="form-select <?= ($validation->hasError('statusBangunan') ? 'is-invalid' : ''); ?>" id="statusBangunan" name="statusBangunan">
                                        <?php if ($validation->hasError('statusBangunan')) : ?>
                                            <option value="" selected>Pilih Status Bangunan...</option>
                                        <?php else : ?>
                                            <?php if (old('statusBangunan')) : ?>
                                                <option value="<?= old('statusBangunan'); ?>" selected><?= old('statusBangunan'); ?></option>
                                            <?php else : ?>
                                                <option value="" selected>Pilih Status Bangunan...</option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <option value="Gedung">Gedung</option>
                                        <option value="Komplek">Komplek</option>
                                        <option value="Perum">Perum</option>
                                        <option value="Kampung">Kampung</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('statusBangunan'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="statusTempat" class="col-sm-4 col-form-label">Status Tempat</label>
                                <div class="col-sm-8">
                                    <select class="form-select <?= ($validation->hasError('statusTempat') ? 'is-invalid' : ''); ?>" id="statusTempat" name="statusTempat">
                                        <?php if ($validation->hasError('statusTempat')) : ?>
                                            <option value="" selected>Pilih Status Tempat...</option>
                                        <?php else : ?>
                                            <?php if (old('statusTempat')) : ?>
                                                <option value="<?= old('statusTempat'); ?>" selected><?= old('statusTempat'); ?></option>
                                            <?php else : ?>
                                                <option value="" selected>Pilih Status Tempat...</option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <option value="Milik">Milik</option>
                                        <option value="Kontrak">Kontrak</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('statusTempat'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenisUsaha" class="col-sm-4 col-form-label">Jenis Usaha</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('jenisUsaha') ? 'is-invalid' : ''); ?>" id="jenisUsaha" name="jenisUsaha" value="<?= old('jenisUsaha'); ?>">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('jenisUsaha'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nomorHP" class="col-sm-4 col-form-label">Nomor HP/WA</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('nomorHP') ? 'is-invalid' : ''); ?>" id="nomorHP" name="nomorHP" value="<?= old('nomorHP'); ?>">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('nomorHP'); ?></b>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="card-title p-0 m-0">Data Tempat Tinggal</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="alamatTempatTinggal" class="col-sm-4 col-form-label">Alamat Tempat Tinggal</label>
                            <div class="col-sm-8">
                                <textarea class="form-control <?= ($validation->hasError('alamatTempatTinggal') ? 'is-invalid' : ''); ?>" id="alamatTempatTinggal" name="alamatTempatTinggal" rows="3"><?= old('alamatTempatTinggal'); ?></textarea>
                                <div class="invalid-feedback">
                                    <b><?= $validation->getError('alamatTempatTinggal'); ?></b>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamatKTP" class="col-sm-4 col-form-label">Alamat sesuai KTP</label>
                            <div class="col-sm-8">
                                <textarea class="form-control <?= ($validation->hasError('alamatKTP') ? 'is-invalid' : ''); ?>" id="alamatKTP" name="alamatKTP" rows="3"><?= old('alamatKTP'); ?></textarea>
                                <div class="invalid-feedback">
                                    <b><?= $validation->getError('alamatKTP'); ?></b>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="statusTempatTinggal" class="col-sm-4 col-form-label">Status Tempat Tinggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('statusTempatTinggal') ? 'is-invalid' : ''); ?>" id="statusTempatTinggal" name="statusTempatTinggal" value="<?= old('statusTempatTinggal'); ?>">
                                <div class="invalid-feedback">
                                    <b><?= $validation->getError('statusTempatTinggal'); ?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary me-md-2" type="button"><i class="fas fa-save"></i> Simpan Data</button>
                    <button type="reset" class="btn btn-secondary" type="button"><i class="fas fa-ban"></i> Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>