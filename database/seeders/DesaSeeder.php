<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $csvFile = database_path('seeders/Data/desa.csv');
        $csv = array_map('str_getcsv', file($csvFile));

        foreach ($csv as $row) {
            echo "Insert desa $row[2]\n";
            DB::table('desas')->insert([
                'id' => $row[0],
                'kecamatan_id' => $row[1],
                'nama' => $row[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
