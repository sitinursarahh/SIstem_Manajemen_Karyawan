<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absen;

class AbsenController extends Controller
{
    // Tampilkan formulir absen
    public function showForm()
    {
        return view('absen_karyawan');
    }

    // Simpan data absen
    public function store(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan catatan absen
        $absen = new Absen();
        $absen->user_id = Auth::id();
        $absen->name = Auth::user()->name;
        $absen->nip = Auth::user()->nip;
        $absen->jabatan = Auth::user()->jabatan; // Perubahan di sini

        // Proses foto yang diunggah
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $absen->photo = $fileName;
        }

        $absen->save();

        return redirect()->route('dashboard.absenKaryawan')->with('success', 'Absen berhasil disimpan');
    }
}
