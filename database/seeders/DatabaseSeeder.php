<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Users
        $this->call(UsersTableSeeder::class);

        // Blog
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);

        $this->call(EntrantsTableSeeder::class);

        $this->call(UniversityEventsTableSeeder::class);
    }
}
