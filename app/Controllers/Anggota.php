<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;
    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $datas = [
            'pages' => 'Anggota',
            'anggota' => $this->anggotaModel->getAnggota()
        ];

        return view('pages/anggota/index', $datas);
    }

    public function detail($idAnggota)
    {
        $idAnggotaDec = base64_decode($idAnggota);

        $datas = [
            'pages' => 'Detail Anggota',
            'anggota' => $this->anggotaModel->getAnggota($idAnggotaDec)
        ];

        if (empty($datas['anggota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Anggota ' . $idAnggotaDec . ' tidak ditemukan');
        }

        return view('pages/anggota/detail', $datas);
    }

    public function create()
    {
        $datas = [
            'pages' => 'Tambah Data Anggota',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/anggota/create', $datas);
    }

    public function save()
    {
        if (!$this->validate([
            'namaPemohon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama pemohon tidak boleh kosong.'
                ]
            ],
            'namaPasangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama pasangan tidak boleh kosong.'
                ]
            ],
            'namaUsaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama usaha tidak boleh kosong.'
                ]
            ],
            'alamatUsaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat usaha tidak boleh kosong.'
                ]
            ],
            'statusBangunan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field status bangunan tidak boleh kosong.'
                ]
            ],
            'statusTempat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field status tempat tidak boleh kosong.'
                ]
            ],
            'jenisUsaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field jenis usaha tidak boleh kosong.'
                ]
            ],
            'nomorHP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nomor HP tidak boleh kosong.'
                ]
            ],
            'alamatTempatTinggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat tempat tinggal tidak boleh kosong.'
                ]
            ],
            'alamatKTP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat KTP tidak boleh kosong.'
                ]
            ],
            'statusTempatTinggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field status tempat tinggal tidak boleh kosong.'
                ]
            ]
        ])) {
            return redirect()->to('/anggota/create')->withInput();
        }


        $initCompany = "KMJ";
        $randNum = rand(100000, 999999);
        $idAnggota = $initCompany . $randNum;

        $searchId = $this->anggotaModel->where(['id_anggota' => $idAnggota])->findAll();

        if (!empty($searchId)) {
            $initCompany = "KMJ";
            $randNum = rand(100000, 999999);
            $idAnggota = $initCompany . $randNum;
        }

        $this->anggotaModel->save([
            'id_anggota' => $idAnggota,
            'nama_pemohon' => $this->request->getVar('namaPemohon'),
            'nama_pasangan' => $this->request->getVar('namaPasangan'),
            'nama_usaha' => $this->request->getVar('namaUsaha'),
            'alamat_usaha' => $this->request->getVar('alamatUsaha'),
            'status_bangunan' => $this->request->getVar('statusBangunan'),
            'status_tempat' => $this->request->getVar('statusTempat'),
            'jenis_usaha' => $this->request->getVar('jenisUsaha'),
            'nomor_hp_anggota' => $this->request->getVar('nomorHP'),
            'alamat_tempat_tinggal' => $this->request->getVar('alamatTempatTinggal'),
            'alamat_ktp' => $this->request->getVar('alamatKTP'),
            'status_tempat_tinggal' => $this->request->getVar('statusTempatTinggal')
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/anggota');
    }

    public function edit($id)
    {
        $idAnggota = base64_decode($id);

        $datas = [
            'pages' => 'Ubah Data Anggota',
            'validation' => \Config\Services::validation(),
            'anggota' => $this->anggotaModel->getAnggota($idAnggota)
        ];

        return view('pages/anggota/edit', $datas);
    }

    public function update($id)
    {
        $idAnggota = base64_decode($id);

        if (!$this->validate([
            'namaPemohon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama pemohon tidak boleh kosong.'
                ]
            ],
            'namaPasangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama pasangan tidak boleh kosong.'
                ]
            ],
            'namaUsaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama usaha tidak boleh kosong.'
                ]
            ],
            'alamatUsaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat usaha tidak boleh kosong.'
                ]
            ],
            'statusBangunan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field status bangunan tidak boleh kosong.'
                ]
            ],
            'statusTempat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field status tempat tidak boleh kosong.'
                ]
            ],
            'jenisUsaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field jenis usaha tidak boleh kosong.'
                ]
            ],
            'nomorHP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nomor HP tidak boleh kosong.'
                ]
            ],
            'alamatTempatTinggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat tempat tinggal tidak boleh kosong.'
                ]
            ],
            'alamatKTP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field alamat KTP tidak boleh kosong.'
                ]
            ],
            'statusTempatTinggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field status tempat tinggal tidak boleh kosong.'
                ]
            ]
        ])) {
            return redirect()->to('/anggota/edit/' . $id)->withInput();
        }

        $dataSelect = $this->anggotaModel->where('id_anggota', $idAnggota)->findAll();

        $idData = $dataSelect[0]['id'];

        $this->anggotaModel->save([
            'id' => $idData,
            'id_anggota' => $idAnggota,
            'nama_pemohon' => $this->request->getVar('namaPemohon'),
            'nama_pasangan' => $this->request->getVar('namaPasangan'),
            'nama_usaha' => $this->request->getVar('namaUsaha'),
            'alamat_usaha' => $this->request->getVar('alamatUsaha'),
            'status_bangunan' => $this->request->getVar('statusBangunan'),
            'status_tempat' => $this->request->getVar('statusTempat'),
            'jenis_usaha' => $this->request->getVar('jenisUsaha'),
            'nomor_hp_anggota' => $this->request->getVar('nomorHP'),
            'alamat_tempat_tinggal' => $this->request->getVar('alamatTempatTinggal'),
            'alamat_ktp' => $this->request->getVar('alamatKTP'),
            'status_tempat_tinggal' => $this->request->getVar('statusTempatTinggal')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/anggota');
    }

    public function delete($id)
    {
        $idAnggota = base64_decode($id);
        $dataSelect = $this->anggotaModel->where('id_anggota', $idAnggota)->findAll();

        $idData = $dataSelect[0]['id'];

        $this->anggotaModel->delete($idData);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/anggota');
    }
}
