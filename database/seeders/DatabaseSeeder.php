<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'wicaksu',
            'email' => 'wicak@wicak.id',
            'role' => 'admin',
            'password' => bcrypt('Jack03061997')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@wicak.id',
            'role' => 'user',
            'password' => bcrypt('Jack03061997')
        ]);

        $this->call([
            ProvinsiSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class
        ]);
    }
}
