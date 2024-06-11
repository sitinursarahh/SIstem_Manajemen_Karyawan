<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    // use HasFactory;

    use Notifiable;
    protected $fillable = [
        'name', 'email', 'nip', 'password', 'jabatan',
    ];
}
