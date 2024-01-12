<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('seeders/Data/kota.csv');
        $csv = array_map('str_getcsv', file($csvFile));
        $i = 0;
        foreach ($csv as $row) {
            $i++;
            $persen = ceil($i / count($csv) * 100);
            echo "  Insert kota [$persen%]\r";
            
            DB::table('kotas')->insert([
                'id' => $row[0],
                'provinsi_id' => $row[1],
                'nama' => $row[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
