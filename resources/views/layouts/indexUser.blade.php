@extends('layouts.app')

@section('title', 'Pengumuman Karyawan')

@section('content')
<div class="container mt-3">
    @foreach($pengumuman as $p)
        <div class="alert alert-info">
            <h4><strong>{{ $p->judul }}</strong></h4>
            <p>{{ $p->isi }}</p>
            <small>{{ $p->created_at ? $p->created_at->format('d-m-Y H:i') : 'Tanggal tidak tersedia' }}</small>
        </div>
    @endforeach
</div>
@endsection
