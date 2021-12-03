<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\PinjamanModel;
use CodeIgniter\HTTP\Request;

class Pinjaman extends BaseController
{
    protected $pinjamanModel;
    protected $anggotaModel;
    public function __construct()
    {
        $this->pinjamanModel = new PinjamanModel();
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $datas = [
            'pages' => 'Pinjaman',
            'pinjaman' => $this->pinjamanModel->findAll(),
        ];
        return view('pages/pinjaman/index', $datas);
    }

    public function create()
    {
        $datas = [
            'pages' => 'Tambah Data Pinjaman',
            'anggota' => $this->anggotaModel->getAnggota(),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/pinjaman/create', $datas);
    }

    public function save()
    {
        if (!$this->validate([
            'nomorAnggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field Anggota tidak boleh kosong.'
                ]
            ],
            'jumlahPinjaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field jumlah pinjaman tidak boleh kosong.'
                ]
            ],
            'lamaAngsuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field lama angsuran dan opsi tidak boleh kosong.'
                ]
            ],
            'opsiLamaAngsuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field opsi ini tidak boleh kosong.'
                ]
            ],
            'rincianAngsuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field rincian angsuran tidak boleh kosong.'
                ]
            ]
        ])) {
            return redirect()->to('/pinjaman/create')->withInput();
        }

        $this->pinjamanModel->save([
            'nomor_pinjaman' => $this->request->getVar('noPinjaman'),
            'tanggal' => $this->request->getVar('tanggalTransaksi'),
            'id_anggota' => $this->request->getVar('nomorAnggota'),
            'jumlah_pinjaman' => $this->request->getVar('jumlahPinjaman'),
            'lama_angsuran' => $this->request->getVar('lamaAngsuranConvert'),
            'besaran_angsuran' => $this->request->getVar('rincianAngsuran'),
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/pinjaman');
    }

    public function edit($id)
    {
        $idPinjaman = base64_decode($id);

        $datas = [
            'pages' => 'Ubah Data Pinjaman',
            'validation' => \Config\Services::validation(),
            'anggota' => $this->anggotaModel->getAnggota(),
            'pinjaman' => $this->pinjamanModel->getPinjaman($idPinjaman)
        ];

        return view('pages/pinjaman/edit', $datas);
    }

    public function update($id)
    {
        $noPinjaman = base64_decode($id);

        if (!$this->validate([
            'nomorAnggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field Anggota tidak boleh kosong.'
                ]
            ],
            'jumlahPinjaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field jumlah pinjaman tidak boleh kosong.'
                ]
            ],
            'lamaAngsuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field lama angsuran dan opsi tidak boleh kosong.'
                ]
            ],
            'opsiLamaAngsuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field opsi ini tidak boleh kosong.'
                ]
            ],
            'rincianAngsuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field rincian angsuran tidak boleh kosong.'
                ]
            ]
        ])) {
            return redirect()->to('/pinjaman/edit/' . $id)->withInput();
        }

        $dataSelect = $this->pinjamanModel->where('nomor_pinjaman', $noPinjaman)->findAll();

        $idData = $dataSelect[0]['id_pinjaman'];

        $this->pinjamanModel->save([
            'id_pinjaman' => $idData,
            'nomor_pinjaman' => $this->request->getVar('noPinjaman'),
            'tanggal' => $this->request->getVar('tanggalTransaksi'),
            'id_anggota' => $this->request->getVar('nomorAnggota'),
            'jumlah_pinjaman' => $this->request->getVar('jumlahPinjaman'),
            'lama_angsuran' => $this->request->getVar('lamaAngsuranConvert'),
            'besaran_angsuran' => $this->request->getVar('rincianAngsuran'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate.');

        return redirect()->to('/pinjaman');
    }

    public function delete($id)
    {
        $noPinjaman = base64_decode($id);
        $dataSelect = $this->pinjamanModel->where('nomor_pinjaman', $noPinjaman)->findAll();

        $idData = $dataSelect[0]['id_pinjaman'];
        $this->pinjamanModel->delete($idData);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/pinjaman');
    }
}
