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
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        {{-- card --}}
        <div class="card">
            <div class="card-header pt-3 pb-2 mb-2">
                <h5 class="card-title">
                    Data Ruang
                </h5>
            </div>
            {{-- card body --}}
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruang</th>
                            <th>Kode Ruang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruangs as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->nama_ruang }}</td>
                                <td>{{ $value->kode_ruang }}</td>
                                <td>
                                    <a href="{{ route('ruang.show', $value->id) }}" class="btn btn-info"
                                        data-toggle="tooltip" data-placement="top" title="info">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                    <a href="{{ route('ruang.edit', $value->id) }}" class="btn btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('ruang.destroy', $value->id) }}" method="POST" class="d-inline">
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
            <div class="card-footer">
                <a href="{{ route('ruang.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Ruang
                </a>
            </div>
        </div>
        {{-- end card --}}
    </section>
@endsection
