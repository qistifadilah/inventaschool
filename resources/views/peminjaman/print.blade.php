<html>

<head>
    <title>Bukti Pinjam</title>
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                line-height: 1.4;
            }

            .content-wrapper {
                width: 100%;
                padding: 20px;
            }

            .card {
                margin-bottom: 20px;
                border: none;
                box-shadow: none;
            }

            .card-header {
                background-color: #f8f9fa;
                padding: 10px 20px;
            }

            .card-title {
                margin-bottom: 0;
            }

            .card-body,
            .card-footer {
                padding: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .btn-info {
                display: none; /* Hide Print and Back buttons */
            }

            /* Add additional styles as needed for printing */
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <section class="row justify-content-center mt-5">
            <div class="col-12 col-md-8">
                <div class="card">
                    {{-- card-header --}}
                    <div class="card-header bg-light-info pt-3 pb-2 mb-2 text-center">
                        <h4 class="card-title">Bukti Peminjaman</h4>
                    </div>
                    {{-- card-body --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode">Kode Peminjaman</label>
                            <input type="text" id="kode"
                                class="form-control @error('kode') is-invalid @enderror" name="kode"
                                value="{{ $peminjaman->kode }}" placeholder="Masukan Kode Peminjaman" readonly>
                        </div>
                        @error('kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" id="id_user"
                                class="form-control @error('id_user') is-invalid @enderror"
                                value="{{ $peminjaman->user->name }}" readonly>
                        </div>
                        @error('id_user')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="id_petugas">Nama Petugas</label>
                            <input type="text" id="id_petugas"
                                class="form-control @error('id_petugas') is-invalid @enderror" name="id_petugas"
                                value="{{ $namaPetugas }}" readonly>
                            {{-- <input type="text" id="id_petugas" class="form-control @error('id_petugas') is-invalid @enderror"
                            value="{{ auth()->user()->name }}"> --}}
                        </div>
                        @error('id_petugas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="id_ruang">Ruang</label>
                            <select name="id_ruang" id="id_ruang"
                                class="form-control @error('id_ruang') is-invalid @enderror" disabled>
                                @forelse ($ruangs as $key => $ruang)
                                    <option value="{{ $ruang->id }}" selected>{{ $ruang->nama_ruang }}</option>
                                @empty
                                    <option disabled>--Data Masih Kosong--</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_inventaris">Nama Barang</label>
                            <select name="" id="id_inventaris"
                                class="form-control @error('id_inventaris') is-invalid @enderror" disabled>
                                @forelse ($inventaris as $key => $value)
                                    <option value="{{ $value->id }}" data-stok="{{ $value->stok }}"
                                        data-ruang="{{ $value->id_ruang }}"
                                        {{ $value->id == $peminjaman->id_inventaris ? 'selected' : '' }}>
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
                            <input type="number" id="stok" class="form-control" name=""
                                placeholder="Stok Barang" value="" readonly>
                        </div>
                        @error('id_inventaris')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="jumlah">Jumlah Pinjam</label>
                            <input type="number" id="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                placeholder="Masukan Jumlah Pinjam" value="{{ $peminjaman->jumlah }}" readonly>
                        </div>
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" id="tanggal_pinjam" class="form-control" name="tanggal_pinjam"
                                placeholder="Masukan Tanggal Pinjam" value="{{ $peminjaman->tanggal_pinjam }}"
                                readonly>
                        </div>
                        @error('tanggal_pinjam')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="text" id="tanggal_kembali" class="form-control" name="tanggal_kembali"
                                value="{{ $peminjaman->tanggal_kembali ?? 'N/A' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" id="status" class="form-control" name="status" placeholder="N/A"
                                value="{{ $peminjaman->status == 1 ? 'Dipinjam' : 'Dikembalikan' }}" readonly>
                        </div>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>