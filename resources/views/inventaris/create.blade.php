@extends('layouts.main')
@section('title', 'Create | Inventaris')
@section('content')
    <div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Inventaris</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('auth.dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{ route('inventaris.index') }}">
                            Inventaris
                        </a>
                    </li>
                    <li class="breadcrumb-item">Create</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- card --}}
    <div class="card">

        {{-- card-header --}}
        <div class="card-header bg-light-primary pt-3 pb-2 mb-2">
            <h4 class="card-title">Form Inventaris</h4>
        </div>

        {{-- card-body --}}
        <form action="{{ route('inventaris.store', $inventaris[0]->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="id_user">Nama Petugas</label>
                    <input type="hidden" id="id_user"
                        class="form-control @error('id_user') is-invalid @enderror" name="id_user"
                        value="{{ $user[0]->id }}">
                    <input type="text" id="id_user"
                        class="form-control @error('id_user') is-invalid @enderror""
                        value="{{ $user[0]->name }}">
                </div>
                @error('id_user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="kode_inventaris">Kode Inventaris</label>
                    <input type="text" id="kode_inventaris"
                        class="form-control @error('kode_inventaris') is-invalid @enderror" name="kode_inventaris"
                        placeholder="Masukan Kode Inventaris">
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"
                        name="nama_barang" placeholder="Masukan Nama Barang">
                </div>
                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" id="kondisi" class="form-control @error('kondisi') is-invalid @enderror"
                        name="kondisi" placeholder="Masukan Kondisi">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                        placeholder="Masukan Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" class="form-control @error('stok') is-invalid @enderror"
                        name="stok" placeholder="Masukan Jumlah Barang">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select name="id_jenis" id="jenis" class="form-select @error('id_jenis') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @forelse ($jenis as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->nama_jenis }}</option>
                        @empty
                            <option disabled>--Data Masih Kosong--</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_ruang">Ruang</label>
                    <select name="id_ruang" id="ruang" class="form-select @error('id_ruang') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @forelse ($ruang as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->nama_ruang }}</option>
                        @empty
                            <option disabled>--Data Masih Kosong--</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_register">Tanggal Register</label>
                    <input type="date" id="tanggal_register"
                        class="form-control @error('tanggal_register') is-invalid @enderror" name="tanggal_register"
                        placeholder="Masukan Tanggal Register">
                </div>
            </div>

            {{-- card footer --}}
            <div class="card-footer bg-body-tertiary" style="border: none;">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <input type="button" class="btn btn-primary" value="Back"
                            onclick="window.location.href='{{ route('inventaris.index') }}'">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
