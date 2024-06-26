@extends('layouts.main')
@section('title', 'Inventaris')
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
                    <li class="breadcrumb-item">Show</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- card --}}
    <section class="id basic-horizontal-layouts">
        <div class="content-wrapper">
            <div class="row match-height justify-content-center">
                <div class="col-md-12 col-12">
                    <div class="card">

                        {{-- card-header --}}
                        <div class="card-header bg-light-info pt-3 pb-2 mb-2 text-center">
                            <h4 class="card-title">Data Inventaris</h4>
                        </div>

                        {{-- card-body --}}
                        <div class="card-body mt-3 pb-0">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id_user">Nama Petugas</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="id_user"
                                                class="form-control @error('id_user') is-invalid @enderror" name="id_user"
                                                value="{{ $inventari->user->name }}" placeholder="Masukan Nama Petugas"
                                                readonly>
                                        </div>
                                        @error('id_user')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="kode_inventaris">Kode Inventaris</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="kode_inventaris"
                                                class="form-control @error('kode_inventaris') is-invalid @enderror"
                                                name="kode_inventaris" value="{{ $inventari->kode_inventaris }}"
                                                placeholder="Masukan Kode Inventaris" readonly>
                                        </div>
                                        @error('kode_inventaris')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="nama_barang">Nama Barang</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="nama_barang"
                                                class="form-control @error('nama_barang') is-invalid @enderror"
                                                name="nama_barang" value="{{ $inventari->nama_barang }}"
                                                placeholder="Masukan Nama Barang" readonly>
                                        </div>
                                        @error('nama_barang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="kondisi">Kondisi</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="kondisi"
                                                class="form-control @error('kondisi') is-invalid @enderror" name="kondisi"
                                                value="{{ $inventari->kondisi }}" placeholder="Masukan Kondisi" readonly>
                                        </div>
                                        @error('kondisi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                                value="" placeholder="Masukan Keterangan" readonly>{{ $inventari->keterangan }}</textarea>
                                        </div>
                                        @error('keterangan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="stok">Stok</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="number" id="stok"
                                                class="form-control @error('stok') is-invalid @enderror" name="stok"
                                                value="{{ $inventari->stok }}" placeholder="Masukan Stok">
                                        </div>
                                        @error('stok')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="id_jenis">Jenis</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <select name="id_jenis" id="basicSelect"
                                                class="form-control @error('id_jenis') is-invalid @enderror" disabled>
                                                @forelse ($jenis as $key => $value)
                                                    <option value="{{ $value->id }}" selected>{{ $value->nama_jenis }}
                                                    </option>
                                                @empty
                                                    <option disabled>--Data Masih Kosong--</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        @error('id_jenis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="id_ruang">Ruang</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <select name="id_ruang" id="basicSelect"
                                                class="form-control @error('id_ruang') is-invalid @enderror" disabled>
                                                @forelse ($ruang as $key => $value)
                                                    <option value="{{ $value->id }}" selected>{{ $value->nama_ruang }}
                                                    </option>
                                                @empty
                                                    <option disabled>--Data Masih Kosong--</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        @error('id_ruang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-2">
                                            <label for="tanggal_register">Tanggal Register</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="date" id="tanggal_register"
                                                class="form-control @error('tanggal_register') is-invalid @enderror"
                                                name="tanggal_register" value="{{ $inventari->tanggal_register }}"
                                                placeholder="Masukan Tanggal Register" readonly>
                                        </div>
                                        @error('tanggal_register')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- card footer --}}
                        <div class="card-footer bg-body-tertiary" style="border: none;">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-start">
                                    <input type="button" class="btn btn-info" value="Back"
                                        onclick="window.location.href='{{ route('inventaris.index') }}'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
