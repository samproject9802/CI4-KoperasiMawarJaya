<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
{
    protected $table      = 'pinjaman';
    protected $primaryKey = 'id_pinjaman';
    protected $useTimestamps = true;
    protected $allowedFields = ['nomor_pinjaman', 'tanggal', 'id_anggota', 'jumlah_pinjaman', 'lama_angsuran', 'besaran_angsuran'];

    public function getPinjaman($idPinjaman = false)
    {
        if ($idPinjaman == false) {
            return $this->findAll();
        }
        return $this->where(['nomor_pinjaman' => $idPinjaman])->first();
    }
}
