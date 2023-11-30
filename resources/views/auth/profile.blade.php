@extends('layouts.main')
@section('title', 'Account Profile')
@section('content')
<div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Account Profile</h3>
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
                            Account Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section my-2">
        <div class="container my-auto">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    {{-- card --}}
                    <div class="card">
                        <div class="card-header text-center pb-0">
                            <h3>Profile {{ Auth::user()->name }}</h3>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="numeric" id="nip" class="form-control" name="nip"
                                    placeholder="Masukan NIP" value="{{ Auth::user()->profile->nip }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Masukan Nama" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Masukan Kode" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" placeholder="Masukan Alamat" name="alamat" readonly>{{ Auth::user()->profile->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer bg-body-tertiary my-0" style="border: none;">
                            <div class="row">
                                <input type="button" class="btn btn-primary" value="Back"
                                    onclick="window.location.href='{{ route('auth.dashboard') }}'">
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}
                </div>
            </div>
        </div>
    </section>
@endsection
