<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ([
            [
            $user = new Pegawai(),
            $user-> name = 'H. YULIPRI, ST., MT',
            $user-> pangkat = 'Pembina Utama Muda',
            $user-> email = 'yulipri@gmail.com',
            $user-> jabatan = 'Kepala Dinas Koperasi, Usaha Kecil dan Menengah',
            $user-> idbidang = 1,
            $user->foto = 'user1.jpg',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'NIA ELIANA,SE',
            $user-> pangkat = 'Penata Tk. I, III/d',
            $user-> email = 'nia@gmail.com',
            $user-> jabatan = 'Kepala Bidang Pelayanan Izin Pengawasan dan Penilaian Koperasi',
            $user-> idbidang = 1,
            $user->foto = 'user2.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'IRWAN SUGARA, A.md',
            $user-> pangkat = 'Penata Muda Tk. 1, III/b',
            $user-> email = 'irwan@gmail.com',
            $user-> jabatan = 'Pengelola Data',
            $user-> idbidang = 1,
            $user->foto = 'user3.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'TIDAR ARDIANSYAH PRASTA, SE., M.Si',
            $user-> pangkat = 'Penata Muda, III/d',
            $user-> email = 'tidar@gmail.com',
            $user-> jabatan = 'Pengawas Koperasi Ahli Muda',
            $user-> idbidang = 1,
            $user->foto = 'user4.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'ANDI BATARI TOJA, S.A.P',
            $user-> pangkat = 'Penata Muda, III/a',
            $user-> email = 'andi@gmail.com',
            $user-> jabatan = 'Pengelola Data',
            $user-> idbidang = 1,
            $user->foto = 'user5.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'ASEP SYAEFUL ANNAM, S.IP',
            $user-> pangkat = 'Penata Muda, III/a',
            $user-> email = 'epul@gmail.com',
            $user-> jabatan = 'Analis Koperasi',
            $user-> idbidang = 1,
            $user->foto = 'user6.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'LENNA NUR MAELANSARI, ST',
            $user-> pangkat = '-',
            $user-> email = 'lenna@gmail.com',
            $user-> jabatan = 'Petugas Tenaga Administrasi',
            $user-> idbidang = 1,
            $user->foto = 'user7.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'Muhammad Risman',
            $user-> pangkat = '-',
            $user-> email = 'risman@gmail.com',
            $user-> jabatan = 'sekertariat',
            $user-> idbidang = 1,
            $user->foto = 'user8.png',
            $user->save(),
            ],
            [
            $user = new Pegawai(),
            $user-> name = 'Aden Ismatullah',
            $user-> pangkat = '-',
            $user-> email = 'aden@gmail.com',
            $user-> jabatan = 'Petugas Tenaga Administrasi',
            $user-> idbidang = 2,
            $user->foto = 'user9.jpg',
            $user->save(),
            ],
        ]);
    }
}