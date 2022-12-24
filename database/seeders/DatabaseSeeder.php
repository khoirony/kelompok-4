<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Pegawai;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 1
        ]);

        User::create([
            'nama' => 'Eko Prayoga',
            'email' => 'eko@gmail.com',
            'password' => bcrypt('12345'),
            'nik' => "6216126123616",
            'tentang' => 'Saya Sebagai Aspirasi Disini',
            'alamat' => 'Lamongan, jawa Timur',
            'no_telp' => '08385893585829',
            'role' => 2
        ]);

        User::create([
            'nama' => 'Khoirony Arief',
            'email' => 'khoirony@gmail.com',
            'password' => bcrypt('12345'),
            'nik' => "62161381381",
            'tentang' => 'Programmer Pemula',
            'alamat' => 'Lamongan, jawa Timur',
            'no_telp' => '083870461640',
            'role' => 2
        ]);
    }
}
