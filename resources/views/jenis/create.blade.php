@extends('layouts.main')
@section('title', 'Create | Jenis')
@section('content')
    <div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Jenis</h3>
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
                        <a href="{{ route('jenis.index') }}">
                            Jenis
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
            <h4 class="card-title">Form Jenis</h4>
        </div>

        {{-- card-body --}}
        <form action="{{ route('jenis.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_jenis">Nama Jenis</label>
                    <input type="text" id="nama_jenis" class="form-control" name="nama_jenis"
                        placeholder="Masukan Nama Jenis" value="">
                </div>
                <div class="form-group">
                    <label for="kode_jenis">Kode Jenis</label>
                    <input type="text" id="kode_jenis" class="form-control" name="kode_jenis"
                        placeholder="Masukan Kode Jenis" value="">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea>
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
                            onclick="window.location.href='{{ route('jenis.index') }}'">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
