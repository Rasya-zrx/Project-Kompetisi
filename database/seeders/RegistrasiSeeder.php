<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('registrasi')->insert([
            'user_id' => 1,
            'kompetisi_id' => 1,
            'tgl_registrasi' => now()
        ]);
    }
}
