<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Aspirasi;


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
            'role' => 1 // Admin = pegawai
        ]);

        User::create([
            'nik' => '332364647',
            'nama' => 'Eko Prayoga',
            'email' => 'eko@gmail.com',
            'password' => bcrypt('123456'),
            'tentang' => 'Saya Sebagai Masyarakat Disini',
            'alamat' => 'Lamongan, jawa Timur',
            'no_telp' => '08385893585829',
            'role' => 2 //user = masyarakat
        ]);
        User::create([
            'nik' => '3923898492',
            'nama' => 'Fulan Fulani',
            'email' => 'fulan@gmail.com',
            'password' => bcrypt('123456'),
            'tentang' => 'Saya Sebagai Masyarakat Disini',
            'alamat' => 'Tuban, jawa Timur',
            'no_telp' => '0838585829',
            'role' => 2 //user = masyarakat
        ]);

        Aspirasi::create([
            'id_user' => '2',
            'isi_aspirasi' => 'Turunkan Harga Chip',
            'status' => '0', //belumdibaca
            'gambar' => 'gambar1.jpg',
        ]);

        Aspirasi::create([
            'id_user' => '3',
            'isi_aspirasi' => 'Turunkan Harga Chip',
            'status' => '1', //sudah dibaca
            'gambar' => 'gambar2.jpg',
        ]);
    }
}
