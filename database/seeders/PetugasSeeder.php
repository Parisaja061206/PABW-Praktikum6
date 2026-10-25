<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Membuat 5 akun petugas dummy
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Membuat 1 akun Admin BPBD Utama
        DB::table('users')->insert([
            'name' => 'Admin BPBD Bandung',
            'email' => 'admin.bpbd@bandungkab.go.id',
            'password' => Hash::make('adminbpbd123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}