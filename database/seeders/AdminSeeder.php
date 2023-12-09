<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user, Profile $profile): void
    {
        //
        $profile->nip       = 005174271401;
        $profile->alamat    = 'gedung barat rpl';
        $profile->save();

        // insert data user
        $user::create([
            'name'          => 'admin',
            'email'         => 'admin@inv.id',
            'password'      => Hash::make('asdfghjkl'),
            'id_profile'    => $profile->id,
            'id_role'       => 3,
        ]);
    }
}
