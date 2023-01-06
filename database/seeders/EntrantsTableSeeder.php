<?php

namespace Database\Seeders;

use App\Models\Entrant\Entrant;
use Illuminate\Database\Seeder;

class EntrantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrant::factory()->count(100)->create();
    }
}
