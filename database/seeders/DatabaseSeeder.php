<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2500)->create();

        \App\Models\User::factory()->create([
            'name' => 'wicaksu',
            'email' => 'wicak@wicak.id',
            'role' => 'admin',
            'is_dumy'=> false,
            'password' => bcrypt('Jack03061997')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Fandy',
            'email' => 'fandy@wicak.id',
            'role' => 'admin',
            'is_dumy'=> true,
            'password' => bcrypt('123456789')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Amirul',
            'email' => 'amirul@wicak.id',
            'role' => 'admin',
            'is_dumy'=> true,
            'password' => bcrypt('123456789')
        ]);

        $this->call([
            ProvinsiSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
            PemiluSeeder::class,
        ]);

    }
}
