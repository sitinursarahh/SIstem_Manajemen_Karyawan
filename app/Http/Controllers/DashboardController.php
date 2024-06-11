<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function showDataPengguna()
    {
        $data['users'] = User::all();


        return view('data_pengguna',$data);
    }

}
