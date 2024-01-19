<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ([
            [
            $user = new User(),
            $user->name = 'H. YULIPRI, ST., MT',
            $user-> email = 'yulipri@gmail.com',
            $user-> level = 'SUPERADMIN',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'NIA ELIANA,SE',
            $user-> email = 'nia@gmail.com',
            $user -> level = 'ADMIN',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'TIDAR ARDIANSYAH PRASTA, SE., M.Si',
            $user-> email = 'tidar@gmail.com',
            $user -> level = 'PEGAWAI',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'IRWAN SUGARA, A.md',
            $user-> email = 'irwan@gmail.com',
            $user -> level = 'PEGAWAI',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'ANDI BATARI TOJA, S.A.P',
            $user-> email = 'andi@gmail.com',
            $user -> level = 'PEGAWAI',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'ASEP SYAEFUL ANNAM, S.IP',
            $user-> email = 'epul@gmail.com',
            $user -> level = 'PEGAWAI',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'LENNA NUR MAELANSARI, ST',
            $user-> email = 'lenna@gmail.com',
            $user -> level = 'PEGAWAI',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'Muhammad Risman',
            $user-> email = 'risman@gmail.com',
            $user -> level = 'SEKERTARIAT',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
            [
            $user = new User(),
            $user->name = 'Aden Ismatullah',
            $user-> email = 'Aden@gmail.com',
            $user -> level = 'PEGAWAI',
            $user-> password = bcrypt('12345678'),
            $user->save(),
            ],
        ]);
    }
}
