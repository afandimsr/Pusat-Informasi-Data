<?php

use Illuminate\Database\Seeder;
use App\Kecamatan;
use App\coba;
use Faker\Generator as Faker;

class KecamatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::truncate();
        
        $kecamatans = DB::table('kecamatan_smgs')->insert([
            ['kecamatan' => 'Banyumanik'],
            ['kecamatan' => 'Gunungpati'],
            ['kecamatan' => 'Mijen'],
            ['kecamatan' => 'Tugu'],
            ['kecamatan' => 'Tembalang'],
            ['kecamatan' => 'Ngaliyan'],
            ['kecamatan' => 'Genuk'],
            ['kecamatan' => 'Gayamsari'],
            ['kecamatan' => 'Candisari'],
            ['kecamatan' => 'Gajahmungkur'],
            ['kecamatan' => 'Pedurungan'],
            ['kecamatan' => 'Semarang Utara'],
            ['kecamatan' => 'Semarang Barat'],
            ['kecamatan' => 'Semarang Timur'],
            ['kecamatan' => 'Semarang Selatan'],
            ['kecamatan' => 'Semarang Tengah']
        ]);
    }
}
