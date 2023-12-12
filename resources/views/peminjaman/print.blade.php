<!DOCTYPE html>
<html>

<head>
    <title>Bukti Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        hr {
            width: 50%;
            margin-top: 10px;
            border: 3px solid #000;
        }

        .table2 {
            font-size: 9pt;
            margin-top: 200px;
            text-align: center;
            justify-content:space-between;
            justify-content: center;
        }
    </style>
    <center>
        <h5>Bukti Peminjaman Sarana dan Prasarana</h5>
        <hr>
        <br>
    </center>

    <table class="table table-bordered">
        <tr>
            <td>Kode Peminjaman</td>
            <td>{{ $peminjaman->kode }}</td>
        </tr>
        <tr>
            <td>Nama Peminjam</td>
            <td>{{ $peminjaman->user->name }}</td>
        </tr>
        <tr>
            <td>Ruang</td>
            <td>{{ $peminjaman->inventaris->ruang->nama_ruang }}</td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>{{ $peminjaman->inventaris->nama_barang }}</td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>{{ $peminjaman->inventaris->stok }}</td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>{{ $peminjaman->jumlah }}</td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td>{{ $peminjaman->tanggal_pinjam }}</td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td>{{ $peminjaman->tanggal_kembali }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $peminjaman->status == 1 ? 'Dipinjam' : 'Dikembalikan' }}</td>
        </tr>
    </table>

    <table class="table2">
        <tr>
            <td>
                <label>Pegawai</label><br><br><br><br><br><br>
                <p>( {{ $peminjaman->user->name }} )</p>
                <p>NIP. {{ $peminjaman->user->profile->nip }}</p>
            </td>
            <td>
                <label>Petugas</label><br><br><br><br><br><br>
                <p>( {{ $namaPetugas }} )</p>
                <p>NIP. {{ $nipPetugas }}</p>
            </td>
        </tr>
    </table>
</body>

</html>
