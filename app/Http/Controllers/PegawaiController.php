<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pegawai; // Mengimpor model Mahasiswa

class PegawaiController extends Controller
{
    public function index()
    {
        $data['pegawai'] = Pegawai::all();

        // Ubah dd() menjadi return view() untuk menampilkan tampilan
        return view('pegawai', $data);
    }
}