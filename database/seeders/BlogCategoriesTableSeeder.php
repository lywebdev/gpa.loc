<?php

namespace Database\Seeders;

use App\Models\Blog\Category;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(50)->create();
        Category::fixTree();
    }
}
