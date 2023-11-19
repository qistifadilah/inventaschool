@extends('layouts.main')
@section('title', 'Ruang')
@section('content')
<div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Ruang</h3>
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
                        <a href="{{ route('ruang.index') }}">
                            Ruang
                        </a>
                    </li>
                    <li class="breadcrumb-item">Show</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- card --}}
    <div class="card">

        {{-- card-header --}}
        <div class="card-header bg-light-info pt-3 pb-2 mb-2">
            <h4 class="card-title">Data Ruang</h4>
        </div>

        {{-- card-body --}}
        <div class="card-body">
            <div class="form-group">
                <label for="nama_ruang">Nama Ruang</label>
                <input type="text" id="nama_ruang" class="form-control" name="nama_ruang"
                    placeholder="Masukan Nama Ruang" value="{{ $ruang->nama_ruang }}" disabled>
            </div>
            <div class="form-group">
                <label for="kode_ruang">Kode Ruang</label>
                <input type="text" id="kode_ruang" class="form-control" name="kode_ruang"
                    placeholder="Masukan Kode Ruang" value="{{ $ruang->kode_ruang }}" disabled>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" class="form-control" name="keterangan" placeholder="Masukan Keterangan" disabled>{{ $ruang->keterangan }}</textarea>
            </div>
        </div>

        {{-- card footer --}}
        <div class="card-footer bg-body-tertiary" style="border: none;">
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <input type="button" class="btn btn-info" value="Back"
                        onclick="window.location.href='{{ route('ruang.index') }}'">
                </div>
            </div>
        </div>
    </div>
@endsection
