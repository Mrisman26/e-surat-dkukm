<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ([
            [
            $user = new Bidang(),
            $user-> namabidang = 'Bidang Pelayanan Izin Pengawasan dan Penilaian Koperasi',
            $user->save(),
            ],
            [
            $user = new Bidang(),
            $user-> namabidang = 'Bidang Usaha Kecil dan Menengah',
            $user->save(),
            ],
        ]);
    }
}