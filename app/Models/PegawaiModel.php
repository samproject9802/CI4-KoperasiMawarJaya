<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_lengkap', 'alamat_lengkap', 'nomor_hp', 'jabatan', 'foto_profile'];

    public function getPegawai($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pegawai' => $id])->first();
    }
}
