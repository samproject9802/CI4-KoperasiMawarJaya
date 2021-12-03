<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $datas = [
            'pages' => 'Beranda',
        ];
        return view('pages/dashboard', $datas);
    }
}
