<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title py-2">Laman <?= $pages; ?></h3>

        <div class="card-tools">
            <a href="/anggota/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Data Anggota
            </a>
        </div>
    </div>

    <div class="card-body">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <table class="table table-bordered text-center" id="tableDaftarAnggota">
            <thead>
                <th>No.</th>
                <th>ID Anggota</th>
                <th>Nama Kreditur</th>
                <th>Nomor HP</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                <?php foreach ($anggota as $a) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $a['id_anggota']; ?></td>
                        <td><?= $a['nama_pemohon']; ?></td>
                        <td><?= $a['nomor_hp_anggota']; ?></td>
                        <td class="btn-group">
                            <form action="/anggota/id/<?= base64_encode($a['id_anggota']) ?>" method="get" class="d-inline">
                                <button type="submit" class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            </form>
                            <a href="/anggota/edit/<?= base64_encode($a['id_anggota']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/anggota/delete/<?= base64_encode($a['id_anggota']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>