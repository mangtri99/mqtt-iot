<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        // $this->call([UsersTableSeeder::class]);
        // \App\Models\Detak::factory(30)->create();
        \App\Models\Suhu::factory(30)->create();
        \App\Models\TekananDarah::factory(30)->create();
    }
}
