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
        $chunkSize = 5000;
        $chunks = array_chunk($csv, $chunkSize);

        $totalChunks = count($chunks);
        $currentChunk = 0;

        foreach ($chunks as $chunk) {
            $currentChunk++;

            $upload_desa = [];

            foreach ($chunk as $row) {
                $upload_desa[] = [
                    'id' => $row[0],
                    'kecamatan_id' => $row[1],
                    'nama' => $this->capitalizeAfterSpace($row[2]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('desas')->insert($upload_desa);
            $percentage = ($currentChunk / $totalChunks) * 100;
            $this->command->getOutput()->write("  Insert desa [" . round($percentage, 2) . "]%"."\r");
        }


    }

}
