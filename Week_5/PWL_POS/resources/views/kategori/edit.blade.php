@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Edit Kategori
        </div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kodeKategori" class="form-label">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori"
                           value="{{ $kategori->kategori_kode }}" placeholder="untuk makanan, contoh = MKN" required>
                </div>

                <div class="mb-3">
                    <label for="namaKategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori"
                           value="{{ $kategori->kategori_nama }}" placeholder="Nama" required>
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="{{ url('kategori') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
