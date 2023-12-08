@extends('layouts.main')
@section('title', 'Bukti Peminjaman')
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
    <section class="id basic-horizontal-layouts">
        <div class="content-wrapper">
            <div class="row match-height justify-content-center">
                <div class="col-md-12 col-12">
                    <div class="card">
                        {{-- card-header --}}
                        <div class="card-header bg-light-info pt-3 pb-2 mb-2 text-center">
                            <h4 class="card-title">Bukti Peminjaman</h4>
                        </div>

                        {{-- card-body --}}
                        <div class="card-body mt-3 pb-0">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="kode">Kode Peminjaman</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kode"
                                                class="form-control @error('kode') is-invalid @enderror" name="kode"
                                                value="{{ $peminjaman->kode }}" placeholder="Masukan Kode Peminjaman"
                                                readonly>
                                        </div>
                                        @error('kode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="nama">Nama Pegawai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id_user"
                                                class="form-control @error('id_user') is-invalid @enderror"
                                                value="{{ $peminjaman->user->name }}" readonly>
                                        </div>
                                        @error('id_user')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="id_petugas">Nama Petugas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id_petugas"
                                                class="form-control @error('id_petugas') is-invalid @enderror"
                                                name="id_petugas" value="{{ $namaPetugas }}" readonly>
                                        </div>
                                        @error('id_petugas')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="id_ruang">Ruang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="id_ruang" id="id_ruang"
                                                class="form-control @error('id_ruang') is-invalid @enderror" readonly>
                                                @forelse ($ruangs as $key => $ruang)
                                                    <option value="{{ $ruang->id }}" selected>
                                                        {{ $ruang->nama_ruang }}</option>
                                                @empty
                                                    <option disabled>--Data Masih Kosong--</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="id_inventaris">Nama Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            @if (!empty($peminjaman->inventaris))
                                                <input type="text" id="id_inventaris_input"
                                                    class="form-control @error('id_inventaris') is-invalid @enderror"
                                                    name="id_inventaris" value="{{ $peminjaman->inventaris->nama_barang }}"
                                                    data-stok="{{ $peminjaman->inventaris->stok }}"
                                                    data-ruang="{{ $peminjaman->inventaris->id_ruang }}" readonly>
                                            @else
                                                <input type="text" id="id_inventaris_input" class="form-control"
                                                    value="Data Masih Kosong" readonly>
                                            @endif  
                                        </div>
                                        @error('id_inventaris')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="stok">Stok Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="stok" class="form-control" name=""
                                                placeholder="Stok Barang" value="" readonly>
                                        </div>
                                        @error('id_inventaris')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="jumlah">Jumlah Pinjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="jumlah"
                                                class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                                placeholder="Masukan Jumlah Pinjam" value="{{ $peminjaman->jumlah }}"
                                                readonly>
                                        </div>
                                        @error('jumlah')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="tanggal_pinjam" class="form-control"
                                                name="tanggal_pinjam" placeholder="Masukan Tanggal Pinjam"
                                                value="{{ $peminjaman->tanggal_pinjam }}" readonly>
                                        </div>
                                        @error('tanggal_pinjam')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="tanggal_kembali">Tanggal Kembali</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="tanggal_kembali" class="form-control"
                                                name="tanggal_kembali"
                                                value="{{ $peminjaman->tanggal_kembali ?? 'N/A' }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status">Status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="status" class="form-control" name="status"
                                                placeholder="N/A"
                                                value="{{ $peminjaman->status == 1 ? 'Dipinjam' : 'Dikembalikan' }}"
                                                readonly>
                                        </div>
                                        @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-body-tertiary" style="border: none;">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-start">
                                    @cannot('isUser')
                                        <input type="button" class="btn btn-info me-2" value="Print"
                                            onclick="window.location.href='{{ route('cetak', $peminjaman->id) }}'">
                                    @endcannot
                                    <input type="button" class="btn btn-info" value="Back"
                                        onclick="window.location.href='{{ route('peminjaman.index') }}'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen stok, id_inventaris, id_ruang, dan nama_ruang
            var stokInput = document.getElementById('stok');
            var idInventarisInput = document.getElementById('id_inventaris_input');
            var idRuangDisplay = document.getElementById('id_ruang');
            var namaRuangDisplay = document.getElementById('nama_ruang');

            // Fungsi untuk mengatur nilai stok, id_ruang, dan nama_ruang saat halaman dimuat
            function setStokAndRuang() {
                var stok = idInventarisInput.getAttribute('data-stok') || '';
                var idRuang = idInventarisInput.getAttribute('data-ruang') || '';
                stokInput.value = stok;
                idRuangDisplay.value = idRuang;
                namaRuangDisplay.value = getNamaRuang(idRuang) || '';
            }

            // Panggil fungsi setStokAndRuang saat halaman dimuat
            setStokAndRuang();

            // Tambahkan event listener untuk merespons perubahan pada input id_inventaris_input
            idInventarisInput.addEventListener('input', setStokAndRuang);

            // Fungsi untuk mendapatkan nama ruang berdasarkan id ruang
            function getNamaRuang(idRuang) {
                var ruang = Array.from(document.getElementById('id_ruang').options).find(function(option) {
                    return option.value == idRuang;
                });
                return ruang ? ruang.text : '';
            }
        });
    </script>
@endsection
