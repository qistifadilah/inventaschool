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
            <div class="card-header">
                <div class="row">
                    <div class="col-6 d-flex">
                        <h5 class="card-title">
                            Data Peminjaman
                        </h5>
                    </div>
                    @cannot('isPetugas')
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-lg"></i>
                                Peminjaman
                            </a>
                        </div>
                    @endcannot
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            @cannot('isUser')
                                <th>Nama Pegawai</th>
                            @endcannot
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            @can('isUser')
                                <th>Nama Petugas</th>
                            @endcan
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                @cannot('isUser')
                                    <td>{{ $value->user->name }}</td>
                                @endcannot
                                <td>{{ $value->inventaris->nama_barang }}</td>
                                <td>{{ $value->tanggal_pinjam }}</td>
                                <td>{{ $value->tanggal_kembali ?? 'N/A' }}</td>
                                @can('isUser')
                                    <td>
                                        @if ($value->id_petugas)
                                            {{ $petugas[$value->id_petugas]->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                @endcan
                                <td>
                                    @if ($value->status == 1)
                                        <span class="badge bg-warning text-white">dipinjam</span>
                                    @elseif($value->status == 2)
                                        <span class="badge bg-success text-white">dikembalikan</span>
                                    @endif
                                </td>
                                <td>
                                    @can('isPetugas')
                                        <a href="{{ route('peminjaman.edit', $value->id) }}" class="btn btn-warning"
                                            data-toggle="tooltip" data-placement="top" title="edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    <a href="{{ route('peminjaman.show', $value->id) }}" class="btn btn-info"
                                        data-toggle="tooltip" data-placement="top" title="print">
                                        <i class="bi bi-printer"></i>
                                    </a>
                                    @can('isAdmin')
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
                                    @endcan
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
