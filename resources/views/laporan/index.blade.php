@extends('layouts.main')
@section('title', 'Jenis')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Jenis</h3>
            {{-- <p class="text-subtitle text-muted">Multiple form layouts, you can use.</p> --}}
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Jenis</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header pt-3 pb-2 mb-2">
                <h5 class="card-title">
                    Data Jenis
                </h5>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporans->inventaris as $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->nama_barang }}</td>
                                @foreach ($laporans->peminjaman as $pinjam)
                                <td>{{ $value->tanggal_pinjam }}</td>
                                <td>{{ $value->tanggal_kembali }}</td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->user->name }}</td>
                                @endforeach
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