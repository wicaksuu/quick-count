<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\wilayah\kecamatan;
use Illuminate\Support\Str;

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

            // 3519
            foreach ($chunk as $row) {
                $empatAngkaTerdepan = substr($row[1], 0, 4);
                $upload_desa[] = [
                    'id' => $row[0],
                    'kecamatan_id' => $row[1],
                    'nama' => $this->capitalizeAfterSpace($row[2]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                if ($empatAngkaTerdepan==3519) {
                    $kec = kecamatan::find($row[1]);
                    $pass = mt_rand(10000000, 99999999);
                    User::factory()->create([
                        'name' => "Admin ".$this->capitalizeAfterSpace($row[2]),
                        'email' => strtolower(str_replace(' ','', $kec->nama))."_".strtolower(str_replace(' ','', $row[2]))."@madiunkab.go.id",
                        'role' => 'desa',
                        'current_team_id'=>$row[0],
                        'is_dumy'=> true,
                        'password' => bcrypt($pass),
                        'password_dumy'=> $pass
                        ]);

                }
            }

            DB::table('desas')->insert($upload_desa);
            $percentage = ($currentChunk / $totalChunks) * 100;
            $this->command->getOutput()->write("  Insert desa [" . round($percentage, 2) . "]%"."\r");
        }


    }

}
