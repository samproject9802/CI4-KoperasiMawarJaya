<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table      = 'anggota';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_anggota',
        'nama_pemohon',
        'nama_pasangan',
        'nama_usaha',
        'alamat_usaha',
        'status_bangunan',
        'status_tempat',
        'jenis_usaha',
        'nomor_hp_anggota',
        'alamat_tempat_tinggal',
        'alamat_ktp',
        'status_tempat_tinggal'
    ];

    public function getAnggota($idAnggota = false)
    {
        if ($idAnggota == false) {
            return $this->findAll();
        }
        return $this->where(['id_anggota' => $idAnggota])->first();
    }
}
