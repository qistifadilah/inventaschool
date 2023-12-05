<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventaSchool</title>
    <link rel="shortcut icon" href="{{ asset('img/inventaris.png') }}" type="image/png">

    @include('style.css')
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/iconly.css') }}">
</head>

<body>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="{{ route('auth.homepage') }}"><img src="{{ asset('img/logo2.png') }}"
                                    style="height : 30px" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="stats-icon me-3 rounded-circle">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">
                                            Login
                                        </h6>
                                        <p class="user-dropdown-status text-sm text-muted">Member</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="{{ route('auth.login') }}">Login</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('auth.register') }}">Register</a></li>
                                </ul>
                            </div>

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <h4 class="text-white text-center">
                            Selamat Datang di InventaSchool !
                        </h4>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon green mb-2">
                                                        <i class="fas fa-user-friends"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h5 class="text-muted font-semibold">Pegawai</h5>
                                                    <h6 class="font-extrabold mb-0">{{ $countUser }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon blue mb-2">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h5 class="text-muted font-semibold">Petugas</h5>
                                                    <h6 class="font-extrabold mb-0">{{ $countPetugas }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="fas fa-box-open"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h5 class="text-muted font-semibold">Barang</h5>
                                                    <h6 class="font-extrabold mb-0">{{ $countBarang }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="fas fa-box-open"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h5 class="text-muted font-semibold">Barang</h5>
                                                    <h6 class="font-extrabold mb-0">{{ $countBarang }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header pb-2">
                                            <div class="row">
                                                <div class="col-6 col-lg-10 col-md-6">
                                                    <h5 class="card-title">
                                                        Data Inventaris
                                                    </h5>
                                                </div>
                                                <div class="col-6 col-lg-2 col-md-6">
                                                    <a href="{{ route('auth.login') }}" class="btn btn-primary">
                                                        <i class="bi bi-plus-lg"></i>
                                                        Peminjaman
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
                                                        <th>Kondisi</th>
                                                        <th>Stok</th>
                                                        <th>Ruang</th>
                                                        <th>Tanggal Register</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($inventaris as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td class="text-capitalize">{{ $value->nama_barang }}</td>
                                                            <td>{{ $value->kondisi }}</td>
                                                            <td>{{ $value->stok }}</td>
                                                            <td>{{ $value->ruang->nama_ruang }}</td>
                                                            <td>{{ $value->tanggal_register }}</td>
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
                            </div>
                        </div>
                    </section>
                </div>
                <footer>
                    <div class="container">
                        <div class="footer clearfix mb-0 text-muted">
                            <div class="float-start">
                                <p>2023 &copy; XII RPL 2</p>
                            </div>
                            <div class="float-end">
                                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                        href="https://www.instagram.com/qu_qiss/">Qisti Fadilah</a></p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        {{-- datatable --}}
        <script src="{{ asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('dist/assets/static/js/pages/simple-datatables.js') }}"></script>
        <script src="{{ asset('dist/assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('dist/assets/static/js/pages/horizontal-layout.js') }}"></script>
        <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>


        <script src="{{ asset('dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('dist/assets/static/js/pages/dashboard.js') }}"></script>

</body>

</html>
