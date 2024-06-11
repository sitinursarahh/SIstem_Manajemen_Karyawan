<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Dapatkan data pengguna yang sedang login
        $user = Auth::user();
        
        // Tampilkan view dengan data pengguna
        return view('profil', compact('user'));
    }
}
