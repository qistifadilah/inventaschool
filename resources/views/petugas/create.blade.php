@extends('layouts.main')
@section('title', 'Create | Petugas')
@section('content')
    <div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Petugas</h3>
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
                        <a href="{{ route('petugas.index') }}">
                            Petugas
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
            <h4 class="card-title">Form Petugas</h4>
        </div>

        {{-- card-body --}}
        <form action="{{ route('petugas.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Petugas</label>
                    <input type="text" id="name" class="form-control" name="name"
                        placeholder="Masukan Nama Petugas" value="{{ old('name') }}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email"
                        placeholder="Masukan Kode Petugas" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password"
                        placeholder="Masukan Password Petugas" value="{{ old('password') }}">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="numeric" id="nip" class="form-control" name="nip"
                        placeholder="Masukan NIP Petugas" value="{{ old('nip') }}">
                </div>
                @error('nip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" placeholder="Masukan Alamat Petugas" name="alamat" value="{{ old('alamat') }}"></textarea>
                </div>
                @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- card footer --}}
            <div class="card-footer bg-body-tertiary" style="border: none;">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <input type="button" class="btn btn-primary" value="Back" onclick="window.location.href='{{ route('petugas.index') }}'">
                </div>
                </div>
            </div>
        </form>
    </div>
@endsection