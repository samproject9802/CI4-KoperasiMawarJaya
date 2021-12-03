<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    protected $pegawaiModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $pegawai = $this->pegawaiModel->findAll();

        $datas = [
            'pages' => 'Pegawai',
            'pegawai' => $pegawai
        ];

        return view('pages/pegawai/index', $datas);
    }

    public function create()
    {
        $datas = [
            'pages' => 'Tambah Data Pegawai',
            'validation' => \Config\Services::validation()
        ];

        return view('pages/pegawai/create', $datas);
    }

    public function save()
    {
        // Validation Input
        if (!$this->validate([
            'namaLengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama lengkap tidak boleh kosong.'
                ]
            ], 'alamatLengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat lengkap tidak boleh kosong.'
                ]
            ], 'nomorHP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nomor HP tidak boleh kosong.'
                ]
            ], 'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field jabatan tidak boleh kosong.'
                ]
            ], 'profilephoto' => [
                'rules' => 'max_size[profilephoto,500]|is_image[profilephoto]|mime_in[profilephoto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/pegawai/create')->withInput()->with('validation', $validation);
            return redirect()->to('/pegawai/create')->withInput();
        }

        // ambil Gambar 
        $fileProfile = $this->request->getFile('profilephoto');
        // apakah tidak ada gambar diupload
        if ($fileProfile->getError() == 4) {
            $namaProfile = 'profile-1.png';
        } else {
            // Generate nama sampul random
            $namaProfile = $fileProfile->getRandomName();
            // pindahkan File
            $fileProfile->move('assets/profile', $namaProfile);
        }

        $this->pegawaiModel->save([
            'nama_lengkap' => $this->request->getVar('namaLengkap'),
            'alamat_lengkap' => $this->request->getVar('alamatLengkap'),
            'nomor_hp' => $this->request->getVar('nomorHP'),
            'jabatan' => $this->request->getVar('jabatan'),
            'foto_profile' => $namaProfile
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/pegawai');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan ID Pegawai
        $pegawai = $this->pegawaiModel->find($id);
        // Cek jika gambar default 
        if ($pegawai['foto_profile'] != 'profile-1.png') {
            // Hapus Gambar
            unlink('assets/profile/' . $pegawai['foto_profile']);
        }

        $this->pegawaiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/pegawai');
    }

    public function edit($id)
    {
        $datas = [
            'pages' => 'Ubah Data Pegawai',
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->pegawaiModel->getPegawai($id)
        ];

        return view('pages/pegawai/edit', $datas);
    }

    public function update($id)
    {
        // Validation Input
        if (!$this->validate([
            'namaLengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama lengkap tidak boleh kosong.'
                ]
            ], 'alamatLengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat lengkap tidak boleh kosong.'
                ]
            ], 'nomorHP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nomor HP tidak boleh kosong.'
                ]
            ], 'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field jabatan tidak boleh kosong.'
                ]
            ], 'profilephoto' => [
                'rules' => 'max_size[profilephoto,500]|is_image[profilephoto]|mime_in[profilephoto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/pegawai/edit/' . $id)->withInput();
        }

        $fileProfile = $this->request->getFile('profilephoto');

        // Cek Gambar 
        if ($fileProfile->getError() == 4) {
            $namaProfile = $this->request->getVar('profileBefore');
        } else {
            // Generate File Random
            $namaProfile = $fileProfile->getRandomName();
            // Pindahkan File
            $fileProfile->move('assets/profile', $namaProfile);
            // Hapus File Lama
            if ($this->request->getVar('profileBefore') != 'profile-1.png') {
                unlink('/assets/profile/' . $this->request->getVar('profileBefore'));
            }
        }

        $this->pegawaiModel->save([
            'id_pegawai' => $id,
            'nama_lengkap' => $this->request->getVar('namaLengkap'),
            'alamat_lengkap' => $this->request->getVar('alamatLengkap'),
            'nomor_hp' => $this->request->getVar('nomorHP'),
            'jabatan' => $this->request->getVar('jabatan'),
            'foto_profile' => $namaProfile,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/pegawai');
    }
}
