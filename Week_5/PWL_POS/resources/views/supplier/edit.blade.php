@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (isset($supplier))
                <form method="POST" action="{{ url('/supplier/' . $supplier->supplier_id) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} <!-- Tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Supplier Nama</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="supplier_nama" name="supplier_nama"
                                value="{{ old('supplier_nama', $supplier->supplier_nama) }}" required>
                            @error('supplier_nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Supplier Telepon</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="supplier_telepon" name="supplier_telepon"
                                value="{{ old('supplier_telepon', $supplier->supplier_telepon) }}" required>
                            @error('supplier_telepon')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Supplier Alamat</label>
                        <div class="col-11">
                            <textarea type="text" class="form-control" id="supplier_alamat" name="supplier_alamat" required>
                             {{ old('supplier_alamat', $supplier->supplier_alamat) }}
                         </textarea>
                            @error('supplier_alamat')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Supplier Kota</label>
                        <div class="col-11">
                            <textarea type="text" class="form-control" id="supplier_kota" name="supplier_kota" required>
                             {{ old('supplier_kota', $supplier->supplier_kota) }}
                         </textarea>
                            @error('supplier_kota')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-11 offset-1">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('supplier') }}">Kembali</a>
                        </div>
                    </div>

                </form>
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('supplier') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @endif
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush
