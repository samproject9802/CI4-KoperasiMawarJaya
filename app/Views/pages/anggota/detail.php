<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="card custom-card">
    <div class="card-header">
        <h3 class="card-title">Laman <?= $pages; ?></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="card-title">Data Usaha</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Pemohon</th>
                                    <td><?= $anggota['nama_pemohon']; ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Pasangan</th>
                                    <td><?= $anggota['nama_pasangan']; ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Usaha</th>
                                    <td><?= $anggota['nama_usaha']; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Usaha</th>
                                    <td>
                                        <p style="text-align: justify; text-justify: inter-word;"><?= $anggota['alamat_usaha']; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Bangunan</th>
                                    <td><?= $anggota['status_bangunan']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status Tempat</th>
                                    <td><?= $anggota['status_tempat']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Usaha</th>
                                    <td><?= $anggota['jenis_usaha']; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor HP/WA</th>
                                    <td><?= $anggota['nomor_hp_anggota']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="card-title">Data Tempat Tinggal</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Alamat Tempat Tinggal</th>
                                    <td>
                                        <p style="text-align: justify; text-justify: inter-word;">
                                            <?= $anggota['alamat_tempat_tinggal']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat sesuai KTP</th>
                                    <td>
                                        <p style="text-align: justify; text-justify: inter-word;">
                                            <?= $anggota['alamat_ktp']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Tempat Tinggal</th>
                                    <td><?= $anggota['status_tempat_tinggal']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <a href="/anggota" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Kembali ke Menu Anggota</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>