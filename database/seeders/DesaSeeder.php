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
    public function capitalizeAfterSpace($string) {

        $string = strtolower($string);
        $data = explode(" ", $string);
        $out=[];
        foreach ($data as $value) {
            $firstLetter = substr($value, 0, 1);
            $result = substr($value, 1);
            $replace = strtoupper($firstLetter);
            $out[] = $replace.$result;
        }
        return implode(" ", $out);
    }
    public function run(): void
    {

        $csvFile = database_path('seeders/Data/desa.csv');
        $csv = array_map('str_getcsv', file($csvFile));
        $i = 0;
        foreach ($csv as $row) {
            $i++;
            $persen = ceil($i / count($csv) * 100);
            echo "  Insert desa [$persen%]\r";
            $upload_desa[]=[
                'id' => $row[0],
                'kecamatan_id' => $row[1],
                'nama' => $this->capitalizeAfterSpace($row[2]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('desas')->insert($upload_desa);

    }
}
