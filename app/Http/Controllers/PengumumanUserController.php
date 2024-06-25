<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanUserController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $pengumuman = new Pengumuman($request->all());
        $pengumuman->save();
        return redirect()->route('pengumuman.index');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());
        return redirect()->route('pengumuman.index');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();
        return redirect()->route('pengumuman.index');
    }

    public function indexUser()
    {
        $pengumuman = Pengumuman::all(); // Mengambil semua data pengumuman

        return view('pengumumanUser', [
            'pengumuman' => $pengumuman,
        ]);
    }
}
