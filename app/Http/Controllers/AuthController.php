<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }

    //register form
    public function register()
    {
        return view('auth.register');
    }

    //store register
    public function store(Request $request, User $user, Profile $profile)
    {
        $request->validate([
            'name'      => 'required|string|max:250',
            'email'     => 'required|email|max:250|unique:users,email',
            'password'  => 'required|min:8',
            'nip'      => 'required|numeric',
            'alamat'    => 'required|min:10'
        ]);

        // save data profile
        $profile->nip       = $request->nip;
        $profile->alamat    = $request->alamat;
        $profile->save();

        // insert data user
        $user::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'id_profile'    => $profile->id,
            'id_role'       => 1,
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('auth.dashboard');
    }

    //login form
    public function login()
    {
        return view('auth.login');
    }

    //login process
    public function auth(Request $request, Auth $auth)
    {
        // validasi form input
        $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required|min:8'
        ]);

        // proses authentikasi
        $credentials = $request->only('email', 'password');
        if ($auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard');
        };

        // jika proses authentikasi gagal maka akan di redirect ke halaman login
        return redirect()->back()->withErrors([
            'email' => 'Email atau password tidak ditemukan'
        ])->onlyInput('email');
    }

    //logout
    public function logout(Request $request, Auth $auth)
    {
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.homepage');
    }

    //dashboard
    public function dashboard(Inventaris $inventaris, Peminjaman $peminjaman)
    {
        if (Auth::check()) {
            // Mengambil jumlah user pegawai
            $countUser = User::where('id_role', 1)->count();
            // Mengambil jumlah user petugas
            $countPetugas = User::where('id_role', 2)->count();
            // Mengambil jumlah user admin
            $countAdmin = User::where('id_role', 3)->count();

            $inventaris = Inventaris::all();
            $peminjaman = Peminjaman::all();
            return view('auth.dashboard', compact('inventaris', 'peminjaman', 'countUser', 'countPetugas', 'countAdmin'));
        }

        return redirect()->route('auth.login');
    }

    //homepage
    public function homepage(Inventaris $inventaris, Peminjaman $peminjaman)
    {
        // Mengambil jumlah user pegawai
        $countUser = User::where('id_role', 1)->count();
        // Mengambil jumlah user petugas
        $countPetugas = User::where('id_role', 2)->count();
        // Mengambil jumlah user admin
        $countAdmin = User::where('id_role', 3)->count();

        // Mengambil data inventaris
        $countBarang = Inventaris::count();

        $inventaris = Inventaris::all();
        $peminjaman = Peminjaman::all();
        return view('auth.landing_page', compact('inventaris', 'peminjaman', 'countUser', 'countPetugas', 'countAdmin', 'countBarang'));
    }
}
