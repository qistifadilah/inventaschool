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
                    <label for="kode">Kode Peminjaman</label>
                    <input type="text" id="kode" class="form-control @error('kode') is-invalid @enderror"
                        name="kode" value="{{ $nextKode }}" placeholder="Masukan Kode Peminjaman" disabled>
                </div>
                @error('kode')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="hidden" id="id" class="form-control @error('id_user') is-invalid @enderror"
                        name="id_user" value="{{ auth()->user()->id }}">
                    <input type="text" id="id" class="form-control @error('id_user') is-invalid @enderror"
                        value="{{ auth()->user()->name }}" disabled>
                </div>
                @error('id_user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="id_petugas">Nama Petugas</label>
                    <input type="hidden" id="id_petugas" class="form-control @error('id_petugas') is-invalid @enderror"
                        name="id_petugas" value="">
                    <input type="text" id="id_petugas" class="form-control @error('id_petugas') is-invalid @enderror"
                        value="N/A" disabled>
                </div>
                @error('id_petugas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="id_ruang">Ruang</label>
                    <select name="id_ruang" id="id_ruang" class="form-select @error('id_ruang') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @forelse ($ruangs as $key => $ruang)
                            <option value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
                        @empty
                            <option disabled>--Data Masih Kosong--</option>
                        @endforelse
                    </select>
                </div>
                @error('id_ruang')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="id_inventaris">Nama Barang</label>
                    <select name="id_inventaris" id="id_inventaris"
                        class="form-select @error('id_inventaris') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @forelse ($inventaris as $value)
                            <option value="{{ $value->id }}" data-stok="{{ $value->stok }}"
                                data-ruang="{{ $value->id_ruang }}">
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
                        value="" readonly>
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
                    <input type="hidden" id="tanggal_kembali" class="form-control" name="tanggal_kembali"
                        placeholder="N/A" value="" readonly>
                    <input type="text" id="tanggal_kembali" class="form-control" name="" value="N/A"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="status" id="status2"
                            checked>
                        <label class="form-check-label" for="status2">
                            Dipinjam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="2" name="status" id="status2"
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
                    <label for="id">Nama Petugas</label>
                    <input type="text" id="id" class="form-control" name="id"
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
        // Event listener untuk mengubah stok berdasarkan pilihan barang
        document.getElementById('id_ruang').addEventListener('change', function() {
            var selectedRuang = this.value;

            // Sembunyikan semua opsi
            Array.from(document.getElementById('id_inventaris').options).forEach(function(option) {
                option.style.display = 'none';
            });

            // Tampilkan hanya opsi dengan ruang yang cocok
            Array.from(document.querySelectorAll('#id_inventaris [data-ruang]')).forEach(function(option) {
                if (option.getAttribute('data-ruang') === selectedRuang || selectedRuang === "") {
                    option.style.display = '';
                }
            });

            // Atur nilai stok untuk opsi pertama yang terlihat
            var visibleOptions = Array.from(document.getElementById('id_inventaris').options).filter(function(
                option) {
                return option.style.display !== 'none';
            });

            if (visibleOptions.length > 0) {
                document.getElementById('stok').value = visibleOptions[0].getAttribute('data-stok');
            } else {
                document.getElementById('stok').value = '';
            }
        });

        document.getElementById('id_inventaris').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('stok').value = selectedOption.getAttribute('data-stok');
        });
    </script>



@endsection
