@extends('layouts.main')
@section('title', 'Create | Peminjaman')
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
                    <li class="breadcrumb-item">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- card --}}
    <div class="card">

        {{-- card-header --}}
        <div class="card-header bg-light-primary pt-3 pb-2 mb-2">
            <h4 class="card-title">Form Peminjaman</h4>
        </div>

        {{-- card-body --}}
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="hidden" id="id_user" class="form-control @error('id_user') is-invalid @enderror"
                        name="id_user" value="{{ $user[0]->id }}">
                    <input type="text" id="id_user" class="form-control @error('id_user') is-invalid @enderror"
                        value="{{ $user[0]->name }}" disabled>
                </div>
                @error('id_user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="id_inventaris">Nama Barang</label>
                    <select name="id_inventaris" id="id_inventaris"
                        class="form-select @error('id_inventaris') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @forelse ($inventaris as $value)
                            <option value="{{ $value->id }}" data-stok="{{ $value->stok }}">
                                {{ $value->nama_barang }}
                            </option>
                        @empty
                            <option disabled>--Data Masih Kosong--</option>
                        @endforelse
                    </select>
                    </select>
                </div>
                @error('id_inventaris')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="number" id="stok" class="form-control" name="" placeholder="Stok Barang"
                        value="" disabled>
                </div>
                @error('id_inventaris')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="jumlah">Jumlah Pinjam</label>
                    <input type="number" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                        name="jumlah" placeholder="Masukan Jumlah Pinjam" value="">
                </div>
                @error('jumlah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" id="tanggal_pinjam" class="form-control" name="tanggal_pinjam"
                        placeholder="Masukan Tanggal Pinjam" value="{{ $today }}" disabled>
                </div>
                @error('tanggal_pinjam')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="text" id="tanggal_kembali" class="form-control" name="tanggal_kembali" placeholder="N/A"
                        value="" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="dipinjam" name="status" id="status2"
                            checked>
                        <label class="form-check-label" for="status2">
                            Dipinjam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="kembali" name="status" id="status2"
                            disabled>
                        <label class="form-check-label" for="status2">
                            Dikembalikan
                        </label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="id_user">Nama Petugas</label>
                    <input type="text" id="id_user" class="form-control" name="id_user"
                        placeholder="Masukan Nama Petugas">
                </div> --}}
            </div>

            {{-- card footer --}}
            <div class="card-footer bg-body-tertiary" style="border: none;">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <input type="button" class="btn btn-primary" value="Back"
                            onclick="window.location.href='{{ route('peminjaman.index') }}'">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('id_inventaris').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('stok').value = selectedOption.getAttribute('data-stok');
        });
    </script>
@endsection
