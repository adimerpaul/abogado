<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UnitSeeder::class,
            UserSeeder::class,
            PermisoSeeder::class,
            PermisoUserSeeder::class,
            TramiteSeeder::class,
            RequisitoSeeder::class,
            ClienteSeeder::class,
            DespachoSeeder::class,
            PrecioSeeder::class,
            EtapaSeeder::class,
        ]);
    }
}
