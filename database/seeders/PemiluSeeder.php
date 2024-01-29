<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemiluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Setting::create([
            'nama'=>'Presiden',
            'status'=>1,
            'description'=>'Pemilu Presiden dan Wakil Presiden',
            'key'=>'type'
        ]);

        Setting::create([
            'nama'=>'DPR RI',
            'status'=>1,
            'description'=>'Pemilu DPR RI',
            'key'=>'type'
        ]);


        Setting::create([
            'nama'=>'DPD RI',
            'status'=>1,
            'description'=>'Pemilu DPD RI',
            'key'=>'type'
        ]);


        Setting::create([
            'nama'=>'DPRD Prov.',
            'status'=>1,
            'description'=>'Pemilu DPRD Prov.',
            'key'=>'type'
        ]);


        Setting::create([
            'nama'=>'DPRD Kota/Kab.',
            'status'=>1,
            'description'=>'Pemilu DPRD Kota/Kab.',
            'key'=>'type'
        ]);


        Setting::create([
            'nama'=>'Gubernur',
            'status'=>1,
            'description'=>'Pemilu Gubernur dan Wakil Gubernur',
            'key'=>'type'
        ]);


        Setting::create([
            'nama'=>'Bupati',
            'status'=>1,
            'description'=>'Pemilu Bupati dan Wakil Bupati',
            'key'=>'type'
        ]);


        Setting::create([
            'nama'=>'Walikota',
            'status'=>1,
            'description'=>'Pemilu Walikota dan Wakil Walikota',
            'key'=>'type'
        ]);




        Setting::create([
            'nama'=>'admin',
            'status'=>1,
            'description'=>'Admin',
            'key'=>'role'
        ]);
        Setting::create([
            'nama'=>'tps',
            'status'=>1,
            'description'=>'Inputer TPS',
            'key'=>'role'
        ]);
        Setting::create([
            'nama'=>'desa',
            'status'=>1,
            'description'=>'Inputer Desa',
            'key'=>'role'
        ]);

    }
}
