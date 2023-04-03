<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mahasiswas')->insert([
            [
                'nim' => '2141720119',
                'nama' => 'Desy Ayurianti',
                'kelas' => 'TI 2G',
                'jurusan' => 'DIV Teknik Informatika',
                'no_handphone' => '082333133322'
            ], 
            [
                'nim' => '2141720120',
                'nama' => 'Mayvita Nur Faizah',
                'kelas' => 'TI 2F',
                'jurusan' => 'DIV Teknik Informatika',
                'no_handphone' => '082333133355'
        
            ],
            [
                'nim' => '2141720121',
                'nama' => 'Andini',
                'kelas' => 'TI 2E',
                'jurusan' => 'DIV Teknik Informatika',
                'no_handphone' => '082333133366'
        
            ],
            [
                'nim' => '2141720122',
                'nama' => 'Alfina Reza',
                'kelas' => 'TI 2C',
                'jurusan' => 'DIV Teknik Informatika',
                'no_handphone' => '082333133377'
        
            ]
        ]);
    }
}

