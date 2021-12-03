<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title py-2">Laman <?= $pages; ?></h3>

        <div class="card-tools">
            <a href="/pinjaman/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Data Pinjaman
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
        <table class="table table-bordered text-center" id="tableDaftarPinjaman">
            <thead>
                <th>No.</th>
                <th>Nomor Pinjaman</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Anggota</th>
                <th>Jumlah Pinjaman</th>
                <th>Lama Angsuran</th>
                <th>Besaran Angsuran</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                <?php foreach ($pinjaman as $pin) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pin['nomor_pinjaman']; ?></td>
                        <td><?= $pin['tanggal']; ?></td>
                        <td><?= $pin['id_anggota']; ?></td>
                        <td><?= $pin['jumlah_pinjaman']; ?></td>
                        <td><?= $pin['lama_angsuran']; ?></td>
                        <td><?= $pin['besaran_angsuran']; ?></td>
                        <td class="btn-group">
                            <!-- <form action="/pinjaman/id/<?= base64_encode($pin['nomor_pinjaman']) ?>" method="get" class="d-inline">
                                <button type="submit" class="btn btn-success"><i class="fas fa-eye"></i> Detail</button>
                            </form> -->
                            <a href="/pinjaman/edit/<?= base64_encode($pin['nomor_pinjaman']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/pinjaman/delete/<?= base64_encode($pin['nomor_pinjaman']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>