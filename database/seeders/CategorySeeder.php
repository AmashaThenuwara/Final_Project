<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Ladies']);
        Category::create(['name' => 'Gents']);
        Category::create(['name' => 'Kids']);
    }
}
