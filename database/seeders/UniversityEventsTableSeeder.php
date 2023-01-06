<?php

namespace Database\Seeders;

use App\Models\UniversityEvent;
use Illuminate\Database\Seeder;

class UniversityEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UniversityEvent::factory()->count(1500)->create();
    }
}
