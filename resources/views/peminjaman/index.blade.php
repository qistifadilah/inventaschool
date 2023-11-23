@extends('layouts.main')
@section('title', 'Peminjaman')
@section('content')
<div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Peminjaman</h3>
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
                        <a href="{{ route('peminjaman.index') }}">
                            Peminjaman
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header pt-3 pb-2 mb-2">
                <h5 class="card-title">
                    {{-- @foreach ($peminjamans as $value)
                        Hi, {{ $value->user->name }}
                    @endforeach --}}
                    Data Peminjaman
                </h5>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>{{ $value->inventaris->nama_barang }}</td>
                                <td>{{ $value->tanggal_pinjam }}</td>
                                <td>{{ $value->tanggal_kembali ?? 'N/A' }}</td>
                                <td>
                                    @if ($value->status == 1)
                                        <span class="badge bg-warning text-white">dipinjam</span>
                                    @elseif($value->status == 2)
                                        <span class="badge bg-success text-white">dikembalikan</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('peminjaman.show', $value->id) }}" class="btn btn-info"
                                        data-toggle="tooltip" data-placement="top" title="info">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                    <a href="{{ route('peminjaman.edit', $value->id) }}" class="btn btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('peminjaman.destroy', $value->id) }}" method="POST"
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
            <div class="card-footer">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Peminjaman
                </a>
            </div>
        </div>
    </section>
@endsection
