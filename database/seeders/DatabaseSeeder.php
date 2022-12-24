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
            'role' => 1 // Admin = pegawai 1
        ]);
        User::create([
            'nama' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 1 // Admin = pegawai 2
        ]);

        User::create([
            'nik' => '332364647',
            'nama' => 'Eko Prayoga',
            'email' => 'eko@gmail.com',
            'password' => bcrypt('12345'),
            'tentang' => 'Saya Sebagai Masyarakat Disini',
            'alamat' => 'Lamongan, jawa Timur',
            'no_telp' => '08385893585829',
            'role' => 2 //user = masyarakat
        ]);

        Aspirasi::create([
            'id_user' => '3',
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
