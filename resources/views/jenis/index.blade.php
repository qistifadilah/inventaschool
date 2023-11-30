@extends('layouts.main')
@section('title', 'Jenis')
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
                        Jenis
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header pb-2">
                <div class="row">
                    <div class="col-9 d-flex">
                        <h5 class="card-title">
                            Data Jenis
                        </h5>
                    </div>
                    <div class="col-3 d-flex">
                        <a href="{{ route('jenis.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                            Jenis
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis</th>
                            <th>Kode Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenis as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->nama_jenis }}</td>
                                <td>{{ $value->kode_jenis }}</td>
                                <td>
                                    <a href="{{ route('jenis.show', $value->id) }}" class="btn btn-info"
                                        data-toggle="tooltip" data-placement="top" title="info">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                    <a href="{{ route('jenis.edit', $value->id) }}" class="btn btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('jenis.destroy', $value->id) }}" method="POST" class="d-inline">
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
        </div>
    </section>
@endsection
