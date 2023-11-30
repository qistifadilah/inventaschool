@extends('layouts.main')
@section('title', 'Pegawai')
@section('content')
    <div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Pegawai</h3>
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
                        Pegawai
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        {{-- card --}}
        <div class="card">
            <div class="card-header pb-2">
                <div class="row">
                    <div class="col-6 d-flex">
                        <h5 class="card-title">
                            Data Pegawai
                        </h5>
                    </div>
                </div>
            </div>
            {{-- card body --}}
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->profile->nip }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form action="{{ route('petugas.destroy', $value->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="delete"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Data masih kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- end card body --}}
        </div>
        {{-- end card --}}
    </section>
@endsection
