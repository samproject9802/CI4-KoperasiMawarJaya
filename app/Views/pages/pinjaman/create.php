<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title p-0 m-0">Laman <?= $pages; ?></h3>
    </div>

    <div class="card-body">
        <?php date_default_timezone_set("Asia/Bangkok"); ?>
        <form action="/pinjaman/save" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3 row">
                <label for="noPinjaman" class="col-sm-2 col-form-label">No. Pinjaman</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="noPinjaman" name="noPinjaman" value="KMWA<?= date('dmYHis'); ?>" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggalTransaksi" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tanggalTransaksi" name="tanggalTransaksi" value="<?= date('Y-m-d'); ?>" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomorAnggota" class="col-sm-2 col-form-label">Anggota</label>
                <div class="col-sm-10">
                    <input class="form-control <?= ($validation->hasError('nomorAnggota') ? 'is-invalid' : ''); ?>" list="datalistOptions" id="nomorAnggota" name="nomorAnggota" placeholder="Ketik nama anggota..." value="<?= old('nomorAnggota'); ?>">
                    <datalist id="datalistOptions">
                        <?php foreach ($anggota as $a) : ?>
                            <option value="<?= $a['id_anggota'] . " - " . $a['nama_pemohon']; ?>">
                            <?php endforeach; ?>
                    </datalist>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nomorAnggota'); ?>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlahPinjaman" class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                <div class="input-group col-sm-10">
                    <span class="input-group-text" id="jumlahPinjaman">Rp.</span>
                    <input type="text" class="form-control <?= ($validation->hasError('jumlahPinjaman') ? 'is-invalid' : ''); ?>" id="jumlahPinjamanVal" aria-describedby="jumlahPinjaman" name="jumlahPinjaman" value="<?= old('jumlahPinjaman'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('jumlahPinjaman'); ?>
                    </div>
                </div>
            </div>
            <div class="mb-3 row g-3 align-items-center">
                <div class="col-sm-2">
                    <label for="lamaAngsuran" class="col-form-label">Lama Angsuran</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control <?= ($validation->hasError('lamaAngsuran') ? 'is-invalid' : ''); ?>" id="lamaAngsuran" name="lamaAngsuran" value="<?= old('lamaAngsuran'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('lamaAngsuran'); ?>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= ($validation->hasError('opsiLamaAngsuran') ? 'is-invalid' : ''); ?>" type="radio" name="opsiLamaAngsuran" id="lamaAngsuran1" value="Hari" <?= old('opsiLamaAngsuran') == "Hari" ? "checked" : ""; ?>>
                        <label class="form-check-label" for="lamaAngsuran1">Hari</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= ($validation->hasError('opsiLamaAngsuran') ? 'is-invalid' : ''); ?>" type="radio" name="opsiLamaAngsuran" id="lamaAngsuran2" value="Minggu" <?= old('opsiLamaAngsuran') == "Minggu" ? "checked" : ""; ?>>
                        <label class="form-check-label" for="lamaAngsuran3">Minggu</label>
                    </div>
                </div>
                <input type="text" id="totalLamaAngsuran" name="lamaAngsuranConvert" class="d-none" value="<?= old('lamaAngsuranConvert') ?>">
            </div>
            <div class="mb-3 row">
                <label for="rincianAngsuran" class="col-sm-2 col-form-label">Rincian Angsuran</label>
                <div class="input-group col-sm-10">
                    <span class="input-group-text" id="rincianAngsuran">Rp.</span>
                    <input type="text" class="form-control <?= ($validation->hasError('rincianAngsuran') ? 'is-invalid' : ''); ?>" aria-describedby="rincianAngsuran" id="rincianAngsuranVal" name="rincianAngsuran" value="<?= old('rincianAngsuran'); ?>">
                    <span class="input-group-text">/ Hari</span>
                    <div class="invalid-feedback">
                        <?= $validation->getError('rincianAngsuran'); ?>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Save Data</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const opsi1 = document.querySelector('#lamaAngsuran1');
    const opsi2 = document.querySelector('#lamaAngsuran2');
    const rincianAngsuran = document.querySelector('#rincianAngsuranVal');

    rincianAngsuran.onclick = () => {
        var jumlahPinjam = $('#jumlahPinjamanVal').val();
        var lamaAngsuran = $('#lamaAngsuran').val();
        let opsiAngsuran = ""
        if (jumlahPinjam != "" && lamaAngsuran != "" && opsi1.checked || opsi2.checked) {
            if (opsi1.checked) {
                opsiAngsuran = "Hari";
            } else if (opsi2.checked) {
                opsiAngsuran = "Minggu";
            }

            if (opsiAngsuran == "Minggu") {
                var totalHari = lamaAngsuran * 7;
            } else {
                totalHari = lamaAngsuran;
            }
            $('#totalLamaAngsuran').val(totalHari);
            $('#rincianAngsuranVal').val(Math.ceil(((jumlahPinjam * 0.2) + parseInt(jumlahPinjam)) / totalHari), 4);
        }
    }
</script>
<?= $this->endSection(); ?>