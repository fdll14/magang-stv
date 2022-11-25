<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\kategori;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $users = [
            [
                'NIM' => 19090072,
                'jurusan' => 'Teknik Informatika',
                'asal' => 'Politeknik Harapan Bersama',
                'name' => 'muhamad shuro fadhillah',
                'username' => 'fdll14',
                'password' => bcrypt('member1'),
                'email' => 'shuro.fadhillah@gmail.com',
                'nohp' => 62895422836123,
                'role' => 'magang'
            ],
            [
                'NIM' => 19090031,
                'jurusan' => 'Teknik Informatika',
                'asal' => 'Politeknik Harapan Bersama',
                'name' => 'fuadi',
                'username' => 'fuad',
                'password' => bcrypt('fuad1'),
                'email' => 'fuad.123@gmail.com',
                'nohp' => 6289542283612,
                'role' => 'magang'
            ],
            [
                'NIM' => 1,
                'jurusan' => 'anjay',
                'asal' => 'satelit',
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin1'),
                'email' => 'admin@gmail.com',
                'nohp' => 62,
                'role' => 'admin'
            ]
        ];

        foreach ($users as $item) {
            User::create($item);
        }
    }
}
