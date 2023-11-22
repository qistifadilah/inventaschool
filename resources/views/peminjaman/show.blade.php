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
                    <li class="breadcrumb-item">Show</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- card --}}
    <div class="card">

        {{-- card-header --}}
        <div class="card-header bg-light-info pt-3 pb-2 mb-2">
            <h4 class="card-title">Bukti Peminjaman</h4>
        </div>

        {{-- card-body --}}
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="hidden" id="id_user" class="form-control @error('id_user') is-invalid @enderror"
                    name="id_user" value="{{ $peminjaman->user->id }}">
                <input type="text" id="id_user" class="form-control @error('id_user') is-invalid @enderror"
                    value="{{ $peminjaman->user->name }}" disabled>
            </div>
            @error('id_user')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="id_inventaris">Nama Barang</label>
                <select name="id_inventaris" id="id_inventaris"
                    class="form-select @error('id_inventaris') is-invalid @enderror" disabled>
                    @forelse ($inventaris as $key => $value)
                        <option value="{{ $value->id }}" data-stok="{{ $value->stok }}"
                            {{ $value->id == $peminjaman->id_inventaris ? 'selected' : '' }} disabled>
                            {{ $value->nama_barang }}
                        </option>
                    @empty
                        <option disabled>--Data Masih Kosong--</option>
                    @endforelse
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
                    name="jumlah" placeholder="Masukan Jumlah Pinjam" value="{{ $peminjaman->jumlah }}" disabled>
            </div>
            @error('jumlah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" id="tanggal_pinjam" class="form-control" name="tanggal_pinjam"
                    placeholder="Masukan Tanggal Pinjam" value="{{ $peminjaman->tanggal_pinjam }}" disabled>
            </div>
            @error('tanggal_pinjam')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="text" id="tanggal_kembali" class="form-control" name="tanggal_kembali" placeholder="N/A"
                    value="{{ $peminjaman->tanggal_kembali }}" disabled>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" class="form-control" name="status" placeholder="N/A"
                    value="{{ $peminjaman->status }}" disabled>
            </div>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="id_user">Nama Petugas</label>
                <input type="hidden" id="id_user" class="form-control @error('id_user') is-invalid @enderror"
                    name="id_user" value="{{ $peminjaman->id_pegawai }}">
                <input type="text" id="id_user" class="form-control @error('id_user') is-invalid @enderror"
                    value="{{ $peminjaman->user->name }}" disabled>
            </div>
        </div>
        <div class="card-footer bg-body-tertiary" style="border: none;">
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <input type="button" class="btn btn-info" value="Back"
                        onclick="window.location.href='{{ route('peminjaman.index') }}'">
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen stok dan id_inventaris
            var stokInput = document.getElementById('stok');
            var idInventarisSelect = document.getElementById('id_inventaris');

            // Fungsi untuk mengatur nilai stok saat halaman dimuat
            function setStok() {
                var selectedOption = idInventarisSelect.options[idInventarisSelect.selectedIndex];
                stokInput.value = selectedOption.getAttribute('data-stok') || '';
            }

            // Panggil fungsi setStok saat halaman dimuat
            setStok();

            // Tambahkan event listener untuk merespons perubahan pada dropdown id_inventaris
            idInventarisSelect.addEventListener('change', setStok);
        });
    </script>
@endsection
