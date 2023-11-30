@extends('layouts.main')
@section('title', 'Inventaris')
@section('content')
    <div class="row mb-2">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Inventaris</h3>
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
                        Inventaris
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
                            Data Inventaris
                        </h5>
                    </div>
                    <div class="col-3 d-flex">
                        <a href="{{ route('inventaris.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                            Inventaris
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Tanggal Register</th>
                            <th>Ruang</th>
                            <th>Nama Petugas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventaris as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-capitalize">{{ $value->nama_barang }}</td>
                                <td>{{ $value->stok }}</td>
                                <td>{{ $value->tanggal_register }}</td>
                                <td>{{ $value->ruang->nama_ruang }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>
                                    <a href="{{ route('inventaris.show', $value->id) }}" class="btn btn-info"
                                        data-toggle="tooltip" data-placement="top" title="info">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                    <a href="{{ route('inventaris.edit', $value->id) }}" class="btn btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @can('isAdmin')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $value->id }}"
                                            data-inventaris-id="{{ $value->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="exampleModalLabel">Konfirmasi</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus <strong>{{ $value->nama_barang }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form id="deleteForm{{ $value->id }}"
                                                            action="{{ route('inventaris.destroy', $value->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger"
                                                                onclick="deleteInventaris({{ $value->id }})">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script>
        function deleteInventaris(id) {
            // Ambil ID inventaris dari tombol delete
            var inventarisId = id;
    
            // Hapus inventaris sesuai ID
            document.getElementById('deleteForm' + inventarisId).submit();
        }
    </script>
@endsection
