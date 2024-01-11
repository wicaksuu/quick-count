<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('seeders/Data/provinsi.csv');
        $csv = array_map('str_getcsv', file($csvFile));

        foreach ($csv as $row) {
            echo "Insert Provinsi $row[1]\n";
            DB::table('provinsis')->insert([
                'id' => $row[0],
                'nama' => $row[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
