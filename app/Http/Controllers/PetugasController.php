<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function pegawai()
    {
        //
        $profile = Profile::all();
        $users = User::where('id_role', 1)->get();
        return view('petugas.pegawai', compact('users'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $profile = Profile::all();
            $users = User::where('id_role', 2 )->get();
            return view('petugas.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user, Profile $profile)
    {
        $request->validate([
            'name'      => 'required|string|max:250',
            'email'     => 'required|email|max:250|unique:users,email',
            'password'  => 'required',
            'nip'      => 'required',
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
            'id_role'       => 2,
        ]);

        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    //delete
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('petugas.index');
    }
}
