<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            
            'username' => 'Bendahara',
            'nama' => 'Bendahara',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()
        ]);

        $admin->assignRole('bendahara');

        $pimpinan = User::create([
            
            'username' => 'Pimpinan',
            'nama' => 'Pimpinan',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()
        ]);

        $pimpinan->assignRole('pimpinan');

        $mhs = User::create([
            
            'username' => 'mahasiswa',
            'nama' => 'mahasiswa',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()
        ]);

        $mhs->assignRole('mahasiswa');
    }
}
