<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title py-2">Laman <?= $pages; ?></h3>

        <div class="card-tools">
            <a href="/pegawai/create" class="btn btn-primary">+ Tambah Pegawai</a>
        </div>
    </div>

    <div class="card-body">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="content-fill p-3">
            <div class="row row-cols-2">
                <?php foreach ($pegawai as $p) : ?>
                    <div class="col">
                        <div class="card mb-3 custom-card" style="max-width: 540px;">
                            <div class="card-header">
                                <?= $p['nama_lengkap']; ?>
                            </div>
                            <div class="row g-0">
                                <div class="profile-pic col-md-5">
                                    <img src="/assets/profile/<?= $p['foto_profile']; ?>" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="card-text"><b>Alamat : </b> </br> <?= $p['alamat_lengkap']; ?></p>
                                        <p class="card-text"><b>Nomor HP : </b> </br> <?= $p['nomor_hp']; ?></p>
                                        <p class="card-text"><b>Jabatan : </b> </br> <?= $p['jabatan']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-around">
                                <a href="/pegawai/edit/<?= $p['id_pegawai']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <form action="/pegawai/<?= $p['id_pegawai']; ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>