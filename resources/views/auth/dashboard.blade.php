@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <header class="bg-primary mb-3 py-3">
        <div class="container">
            <h4 class="text-white text-center">
                Selamat Datang {{ Auth::user()->name }} di InventaSchool !
            </h4>
        </div>
    </header>
    <div class="content-wrapper container">
        @can('isAdmin')
            <div class="page-content">
            <section class="row justify-content-between">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">Pegawai</h5>
                                    <h6 class="text-muted mb-0">{{ $countUser }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">Petugas</h5>
                                    <h6 class="text-muted mb-0">{{ $countPetugas }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">Admin</h5>
                                    <h6 class="text-muted mb-0">{{ $countAdmin }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @endcan
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-2">
                        <div class="row">
                            <div class="col-9 d-flex">
                                <h5 class="card-title">
                                    Data Inventaris
                                </h5>
                            </div>
                            @can('isUser')
                                <div class="col-3 d-flex">
                                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-lg"></i>
                                        Peminjaman
                                    </a>
                                </div>
                            @endcan
                            @cannot('isUser')
                                <div class="col-3 d-flex">
                                    <a href="{{ route('inventaris.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-lg"></i>
                                        Inventaris
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
                                    <th>Nama Barang</th>
                                    <th>Kondisi</th>
                                    <th>Stok</th>
                                    <th>Ruang</th>
                                    <th>Tanggal Register</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inventaris as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->nama_barang }}</td>
                                        <td>{{ $value->kondisi }}</td>
                                        <td>{{ $value->stok }}</td>
                                        <td>{{ $value->ruang->nama_ruang }}</td>
                                        <td>{{ $value->tanggal_register }}</td>
                                        <td>
                                            <a href="{{ route('inventaris.show', $value->id) }}" class="btn btn-info"
                                                data-toggle="tooltip" data-placement="top" title="info">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
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
            </div>
        </section>
        @cannot('isUser')
            <section class="row">
                <div class="card">
                    <div class="card-header pb-2">
                        <div class="row">
                            <div class="col-12 d-flex">
                                <h5 class="card-title">
                                    Data Peminjaman
                                </h5>
                            </div>
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
                                @forelse ($peminjaman as $key => $value)
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
                                                data-toggle="tooltip" data-placement="top" title="show">
                                                <i class="bi bi-info-circle"></i>
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
        @endcannot
    </div>
@endsection
